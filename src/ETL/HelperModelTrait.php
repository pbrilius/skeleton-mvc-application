<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace ETL;

use Ramsey\Uuid\Uuid;

/**
 * Base model for ETL
 * 
 * @category ETL
 * @package  C2C
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait HelperModelTrait
{
    protected $baseLevel = 14*1024;
    
    /**
     * Base source table up
     *
     * @return void
     */
    public function baseUp(): void
    {
        /**
         * PDO base
         * 
         * @var \PDO $pdoBase PDO base
         */
        $pdoBase = $this->getPdoBase();

        $stmt = $pdoBase->prepare(
            'SELECT COUNT(id) AS sum_base FROM ' . $this->_tableBase
        );

        $stmt->execute();
        $baseTotal = $stmt->fetchColumn();

        if ($this->baseLevel - $this->baseLevel * 0.05 <= (int) $baseTotal) {
            return;
        }

        $stmt = $pdoBase->prepare('SET foreign_key_checks=0');
        $stmt->execute();

        $stmt = $pdoBase->prepare(
            'TRUNCATE `' . $this->_tableBase . '`'
        );
        $stmt->execute();

        $stmt = $pdoBase->prepare(
            'INSERT INTO ' . $this->_tableBase . '('
            . 'id, '
            . 'date_since, '
            . 'date_to, '
            . 'interest_rates, '
            . 'enterprise_interest_rates, '
            . 'user, '
            . 'total'
            . ') '
            . 'VALUES ('
            . '?, '
            . '?, '
            . '?, '
            . '?, '
            . '?, '
            . '?, '
            . '?'
            . ')'
        );

        try {
            $pdoBase->beginTransaction();
            for ($i = 0; $i < $this->baseLevel; $i++) {
                $data = [
                    Uuid::uuid1()->toString(),
                    (new \DateTime('-4 months'))->format('Y-m-d H:i:s'),
                    (new \DateTime('+2 months'))->format('Y-m-d H:i:s'),
                    random_int(4, 24),
                    random_int(1, 4),
                    Uuid::uuid6()->toString(),
                    random_int(1000, 10000)
                ];

                $stmt->execute($data);
            }
            $pdoBase->commit();
        } catch (\PDOException $e) {
            $pdoBase->rollBack();
        }

        $stmt = $pdoBase->prepare('SET foreign_key_checks=1');
        $stmt->execute();

    }
}