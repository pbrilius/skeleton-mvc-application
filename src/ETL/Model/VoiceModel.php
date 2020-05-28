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
     * Target model constructor
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
     * Process
     *
     * @return array
     */
    public function process(): array
    {
        /**
         * PDO base
         * 
         * @var \PDO $pdoBase PDO
         */
        $pdoBase = $this->getPdoBase();
        /**
         * ETL base
         * 
         * @var \PDO $pdoEtl PDO
         */
        $pdoEtl = $this->getPdoEtl();

        $stmt = $pdoBase->prepare(
            $this->sumSprint
        );
        $stmt->execute(
            [
                ':tableBase' => $this->_tableBase,
            ]
        );
        $sumVoices = $stmt->fetchColumn();
        
        $rounds = floor($sumVoices / $this->limit) + 1;
        $offset = 0;

        for ($i = 0; $i < $rounds; $i++) {
            $stmt = $pdoBase->prepare(
                'SELECT '
                    . '`id`, '
                    . 'AVG(`voice`) AS avg_voice, '
                    . 'MIN(`voice`) AS min_voice, '
                    . 'MAX(`voice`) AS max_voice '
                    . 'FROM `:tableBase` '
                    . 'LIMIT :limit '
                    . 'OFFSET :offset '
                    . 'ORDER BY `date_created` DESC '
                    . 'GROUP BY `note`'
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
                        . ':voiceUuid, '
                        . ':max, '
                        . ':min, '
                        . ':average'
                        . ')'
                );

                $stmt->execute(
                    [
                        ':tableEtl' => $this->_tableEtl,
                        ':uuid' => Uuid::uuid1(),
                        ':voiceUuid' => $result['id'],
                        ':max' => $result['max_voice'],
                        ':min' => $result['min_voice'],
                        ':average' => $result['avg_voice'],
                    ]
                );
            }

            $offset += $this->limit;
        }

        return [
            'job' => __CLASS__,
            'status' => BaseModelStatuses::OK,
        ];
    }
}