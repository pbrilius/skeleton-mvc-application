<?php

/**
 * PHP version 7
 * 
 * @category Model
 * @package  Proceedings
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace ETL\Model;

use ETL\BaseModel;
use ETL\BaseModelStatuses;
use Ramsey\Uuid\Uuid;

/**
 * Media models stack
 * 
 * @category ETL
 * @package  Image
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageModel extends BaseModel
{
    /**
     * Target moel constructor
     *
     * @param \PDO   $pdoBase   Base
     * @param \PDO   $pdoEtl    ETL
     * @param string $tableBase Target table
     * @param string $tableEtl  ETL table
     */
    public function __construct(\PDO $pdoBase, \PDO $pdoEtl, string $tableBase, string $tableEtl)
    {
        parent::__construct($pdoBase, $pdoEtl);

        $this->_tableBase = $tableBase;
        $this->_tableEtl = $tableEtl;
    }
    
    /**
     * Processing
     *
     * @return array
     */
    public function process(): array
    {
        /**
         * PDO base
         * 
         * @var \PDO $pdoBase \PDO
         */
        $pdoBase = $this->getPdoBase();
        $pdoEtl = $this->getPdoEtl();

        $stmt = $pdoBase->prepare(
            $this->sumSprint
        );
        $stmt->execute(
            [
                ':tableBase' => $this->_tableBase,
            ]
        );
        $sumImages = $stmt->fetchColumn();
        
        $rounds = floor($sumImages / $this->limit) + 1;
        $offset = 0;

        for ($i = 0; $i < $rounds; $i++) {
            $stmt = $pdoBase->prepare(
                'SELECT '
                    . '`id`, '
                    . 'AVG(`jpeg`) AS avg_jpeg, '
                    . 'MIN(`jpeg`) AS min_jpeg, '
                    . 'MAX(`jpeg`) AS max_jpeg'
                    . 'FROM `:tableBase` '
                    . 'LIMIT :limit '
                    . 'OFFSET :offset '
                    . 'ORDER BY `date_created` DESC '
                    . 'GROUP BY `id`'
            );
            $stmt->bindParam(':tableBase', $this->_tableBase);
            $stmt->bindParam(':limit', $this->limit);
            $stmt->bindParam(':offset', $offset);

            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $stmt = $pdoEtl->prepare(
                    'INSERT INTO `:tableEtl` '
                        . '('
                        . '`id`, '
                        . '`image`, '
                        . '`max`, '
                        . '`min`, '
                        . '`average`'
                        . ')'
                        . 'VALUES ('
                        . ':uuid, '
                        . ':imageUuid, '
                        . ':max, '
                        . ':min, '
                        . ':average'
                        . ')'
                );

                $stmt->execute(
                    [
                        ':tableEtl' => $this->_tableEtl,
                        ':id' => Uuid::uuid4(),
                        ':imageUuid' => $result['id'],
                        ':max' => $result['max_jpeg'],
                        ':min' => $result['min_jpeg'],
                        ':average' => $result['avg_jpeg'],
                    ]
                );
            }

            $offset *= $this->limit;
        }

        return [
            'job' => __CLASS__,
            'status' => BaseModelStatuses::OK,
        ];
    }
}
