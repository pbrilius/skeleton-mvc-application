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
use ETL\HelperModelTrait;
use Ramsey\Uuid\Uuid;

/**
 * C2C models stack
 * 
 * @category ETL
 * @package  C2C
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LoanModel extends BaseModel
{
    use HelperModelTrait;

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
     * ETL processing
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

        $stmt = $pdoEtl->prepare(
            'TRUNCATE `' . $this->_tableEtl . '`'
        );
        $stmt->execute();
        
        $stmt = $pdoBase->prepare(
            sprintf($this->sumSprint, $this->_tableBase)
        );
        $stmt->execute();
        $sumLoans = $stmt->fetchColumn();
        $rounds = floor($sumLoans / $this->limit) + 1;
        $offset = 0;

        $stmtSprintTemplate = 'SELECT '
            . 'user, '
            . 'AVG(`interest_rates`) AS avg_interest_rates, '
            . 'MIN(`interest_rates`) AS min_interest_rates, '
            . 'MAX(`interest_rates`) AS max_interest_rates, '
            . 'AVG(`enterprise_interest_rates`) AS avg_enterprise_interest_rates, '
            . 'MIN(`enterprise_interest_rates`) AS min_enterprise_interest_rates, '
            . 'MAX(`enterprise_interest_rates`) AS max_enterprise_interest_rates, '
            . 'AVG(`total`) AS avg_total, '
            . 'MIN(`total`) AS min_total, '
            . 'MAX(`total`) AS max_total '
            . 'FROM %s '
            . 'GROUP BY user '
            . 'LIMIT %s '
            . 'OFFSET %s ';

        for ($i = 0; $i < $rounds; $i++) {
            $stmtSprint = sprintf(
                $stmtSprintTemplate,
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
                . '`user`, '
                . '`max_interest_rates`, '
                . '`min_interest_rates`, '
                . '`average_interest_rates`, '
                . '`max_enterprise_interest_rates`, '
                . '`min_enterprise_interest_rates`, '
                . '`average_enterprise_interest_rates`, '
                . '`max_total`, '
                . '`min_total`, '
                . '`average_total`'
                . ') '
                . 'VALUES ('
                . ':uuid, '
                . ':user, '
                . ':max_interest_rates, '
                . ':min_interest_rates, '
                . ':avg_interest_rates, '
                . ':max_enterprise_interest_rates, '
                . ':min_enterprise_interest_rates, '
                . ':avg_enterprise_interest_rates, '
                . ':max_total, '
                . ':min_total, '
                . ':avg_total'
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
                            ':user' => $result['user'],
                            ':max_interest_rates' => $result['max_interest_rates'],
                            ':min_interest_rates' => $result['min_interest_rates'],
                            ':avg_interest_rates' => $result['avg_interest_rates'],
                            ':max_enterprise_interest_rates' => $result['max_enterprise_interest_rates'],
                            ':min_enterprise_interest_rates' => $result['min_enterprise_interest_rates'],
                            ':avg_enterprise_interest_rates' => $result['avg_enterprise_interest_rates'],
                            ':max_total' => $result['max_total'],
                            ':min_total' => $result['min_total'],
                            ':avg_total' => $result['avg_total'],
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
