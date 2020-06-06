<?php

/**
 * PHP version 7
 * 
 * @category TDD
 * @package  BDD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace App\Facilitator;

use League\Container\Container;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Base TDD - BDD - PDO stack
 * 
 * @category Unit_Cases
 * @package  ETL
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseEtlTddUnit extends TestCase
{
    /**
     * Container
     *
     * @var Container
     */
    private $_container;

    protected $rate = 1024 * 24;

    private $_tCorrection = 0.05;

    protected $uuidFormat = '/\w{8}\-\w{4}\-\w{4}\-\w{4}\-\w{12}/';

    /**
     * Power up the boot device
     *
     * @return void
     */
    public function setUp(): void
    {
        $container = include __DIR__
            . '/..'
            . '/..'
            . '/..'
            . '/bootstrap'
            . '/container.php';

        $this->_container = $container;

        /**
         * PDO TDD ETL
         * 
         * @var \PDO $pdoEtlTdd PDO
         */
        $pdoEtlTdd = $container
            ->get('mysql.pdo.tdd')[1];

        $stmt = $pdoEtlTdd->prepare(
            'TRUNCATE `image_etl`'
        );
        $stmt->execute();

        $stmt = $pdoEtlTdd->prepare(
            'TRUNCATE `video_etl`'
        );
        $stmt->execute();

        $stmt = $pdoEtlTdd->prepare(
            'TRUNCATE `voice_etl`'
        );
        $stmt->execute();


        /**
         * PDO TDD
         * 
         * @var \PDO $pdoAppTdd PDO
         */
        $pdoAppTdd = $container
            ->get('mysql.pdo.tdd')[0];

        $baseEtl = [];

        $stmt = $pdoAppTdd->prepare('SELECT COUNT(*) FROM user');
        $stmt->execute();
        $baseEtl[] = $stmt->fetchColumn();

        $stmt = $pdoAppTdd->prepare('SELECT COUNT(*) FROM note');
        $stmt->execute();
        $baseEtl[] = $stmt->fetchColumn();

        $stmt = $pdoAppTdd->prepare('SELECT COUNT(*) FROM image');
        $stmt->execute();
        $baseEtl[] = $stmt->fetchColumn();

        $stmt = $pdoAppTdd->prepare('SELECT COUNT(*) FROM voice_memo');
        $stmt->execute();
        $baseEtl[] = $stmt->fetchColumn();

        $stmt = $pdoAppTdd->prepare('SELECT COUNT(*) FROM video_memo');
        $stmt->execute();
        $baseEtl[] = $stmt->fetchColumn();

        $baseZero = false;
        foreach ($baseEtl as $etl) {
            if ($etl >= $this->rate - $this->rate * $this->_tCorrection) {
                continue;
            }

            $baseZero = true;
            break;
        }

        if (!$baseZero) {
            return;
        }

        $stmt = $pdoAppTdd->prepare('SET foreign_key_checks=0');
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'TRUNCATE `user`'
        );
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'TRUNCATE `image`'
        );
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'TRUNCATE `note`'
        );
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'TRUNCATE `video_memo`'
        );
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'TRUNCATE `voice_memo`'
        );
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare('SET foreign_key_checks=1');
        $stmt->execute();

        $stmt = $pdoAppTdd->prepare(
            'INSERT INTO image ('
                . 'id, '
                . 'label, '
                . 'jpeg, '
                . 'date_created '
                . ') '
                . 'VALUES ('
                . '?, '
                . '?, '
                . '?, '
                . '?'
                . ')'
        );
        try {
            $pdoAppTdd->beginTransaction();
            for ($i = 0; $i < $this->rate; $i++) {
                $data = [
                    Uuid::uuid6()->toString(),
                    hash('md5', random_bytes(16)),
                    hash('md5', random_bytes(24)),
                    (new \DateTime())->format('Y-m-d H:i:s'),
                ];

                $stmt->execute($data);
            }
            $pdoAppTdd->commit();
        } catch (\PDOException $e) {
            $pdoAppTdd->rollBack();
        }

        $stmt = $pdoAppTdd->prepare(
            'INSERT INTO user ('
                . 'id, '
                . 'email, '
                . 'hash '
                . ') '
                . 'VALUES ('
                . '?, '
                . '?, '
                . '?'
                . ')'
        );
        $userBase = [];
        try {
            $pdoAppTdd->beginTransaction();
            for ($i = 0; $i < $this->rate; $i++) {
                $data = [
                    Uuid::uuid6()->toString(),
                    hash('crc32', random_bytes(16)),
                    hash('whirlpool', random_bytes(24)),
                ];

                $userBase[] = $data;

                $stmt->execute($data);
            }
            $pdoAppTdd->commit();
        } catch (\PDOException $e) {
            $pdoAppTdd->rollBack();
        }

        $stmt = $pdoAppTdd->prepare(
            'INSERT INTO note ('
                . 'id, '
                . 'user '
                . ') '
                . 'VALUES ('
                . '?, '
                . '?'
                . ')'
        );
        $noteBase = [];
        try {
            $pdoAppTdd->beginTransaction();
            for ($i = 0; $i < $this->rate; $i++) {
                $data = [
                    Uuid::uuid6()->toString(),
                    $userBase[$i][0],
                ];
                $noteBase[] = $data;
                $stmt->execute($data);
            }
            $pdoAppTdd->commit();
        } catch (\PDOException $e) {
            $pdoAppTdd->rollBack();
        }

        $stmt = $pdoAppTdd->prepare(
            'INSERT INTO voice_memo ('
                . '`id`, '
                . '`note`, '
                . '`record`, '
                . '`date_created` '
                . ') '
                . 'VALUES ('
                . '?, '
                . '?, '
                . '?, '
                . '?'
                . ')'
        );

        try {
            $pdoAppTdd->beginTransaction();
            for ($i = 0; $i < $this->rate; $i++) {
                $data = [
                    Uuid::uuid6()->toString(),
                    $noteBase[$i][0],
                    hash('whirlpool', random_bytes(4)),
                    (new \DateTime())->format('Y-m-d H:i:s'),
                ];

                $stmt->execute($data);
            }
            $pdoAppTdd->commit();
        } catch (\PDOException $e) {
            $pdoAppTdd->rollBack();
        }

        $stmt = $pdoAppTdd->prepare(
            'INSERT INTO video_memo ('
                . 'id, '
                . 'note, '
                . 'record, '
                . 'date_created '
                . ') '
                . 'VALUES ('
                . '?, '
                . '?, '
                . '?, '
                . '?'
                . ')'
        );
        try {
            $pdoAppTdd->beginTransaction();
            for ($i = 0; $i < $this->rate; $i++) {
                $data = [
                    Uuid::uuid6()->toString(),
                    $noteBase[$i][0],
                    hash('md5', random_bytes(5)),
                    (new \DateTime())->format('Y-m-d H:i:s'),
                ];

                $stmt->execute($data);
            }
            $pdoAppTdd->commit();
        } catch (\PDOException $e) {
            $pdoAppTdd->rollBack();
        }

        $this->assertPreConditions();
    }

    /**
     * Poweroff
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->_container);

        $this->assertPostConditions();
    }

    /**
     * Container getter
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->_container;
    }
}
