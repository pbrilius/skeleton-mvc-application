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
 * @package  Voice
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VoiceModel extends BaseModel
{
    /**
     * Process
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
            'SELECT '
                . '`id, '
                . 'AVG(`jpeg`) AS avg_jpeg, '
                . 'MIN(`jpeg`) AS min_jpeg, '
                . 'MAX(`jpeg`) AS max_jpeg'
                . 'FROM `image` '
                . 'LIMIT :limit '
                . 'ORDER BY `date_created` DESC'
        );
        $stmt->bindParam(':limit', $this->limit);

        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $stmt = $pdoEtl->prepare(
                'INSERT INTO `image_etl` '
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
                    ':id' => Uuid::uuid4(),
                    ':imageUuid' => $result['id'],
                    ':max' => $result['max_jpeg'],
                    ':min' => $result['min_jpeg'],
                    ':average' => $result['avg_jpeg'],
                ]
            );
        }

        return [
            'Job' => __CLASS__,
            'status' => BaseModelStatuses::OK,
        ];
    }
}