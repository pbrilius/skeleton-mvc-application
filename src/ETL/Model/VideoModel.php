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
 * @package  Video
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoModel extends BaseModel
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
            sprintf($this->sumSprint, $this->_tableBase)
        );
        $stmt->execute();
        $sumVoiceMemos = $stmt->fetchColumn();

        $rounds = floor($sumVoiceMemos / $this->limit) + 1;
        $offset = 0;

        $stmtSprint = 'SELECT '
            . 'note, '
            . 'AVG(`record`) AS avg_record, '
            . 'MIN(`record`) AS min_record, '
            . 'MAX(`record`) AS max_record '
            . 'FROM %s '
            . 'GROUP BY note '
            . 'LIMIT %s '
            . 'OFFSET %s ';

        for ($i = 0; $i < $rounds; $i++) {
            $stmtSprint = sprintf(
                $stmtSprint,
                $this->_tableBase,
                $this->limit,
                $offset
            );

            $stmt = $pdoBase->prepare(
                $stmtSprint
            );

            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $stmtSprintInsert = 'INSERT INTO %s '
                . '('
                . '`id`, '
                . '`note`, '
                . '`max`, '
                . '`min`, '
                . '`average`'
                . ')'
                . 'VALUES ('
                . ':uuid, '
                . ':note, '
                . ':max, '
                . ':min, '
                . ':average'
                . ')';

            $stmtSprintInsert = sprintf($stmtSprintInsert, $this->_tableEtl);

            try {
                $pdoEtl->beginTransaction();
                foreach ($results as $result) {
                    $stmt = $pdoEtl->prepare(
                        $stmtSprintInsert
                    );

                    $stmt->execute(
                        [
                            ':uuid' => Uuid::uuid4()->toString(),
                            ':note' => $result['note'],
                            ':max' => (int) $result['max_record'],
                            ':min' => (int) $result['min_record'],
                            ':average' => (float) $result['avg_record'],
                        ]
                    );
                }
                $pdoEtl->commit();
            } catch (\PDOException $e) {
                $pdoEtl->rollBack();
            }

            $offset += $this->limit;
        }

        return [
            'job' => __CLASS__,
            'status' => BaseModelStatuses::OK,
        ];
    }
}
