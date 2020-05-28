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

namespace Tests\ETL\TDD;

use App\Facilitator\BaseEtlTddUnit;
use ETL\Model\ImageModel;
use Ramsey\Uuid\Uuid;

/**
 * High end ETL stack
 * 
 * @category Unit_Cases
 * @package  Drill
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageDrillTest extends BaseEtlTddUnit
{
    /**
     * Container load up case
     *
     * @return void
     */
    public function testLoadContainerData(): void
    {
        $container = $this->getContainer();

        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $container->get('mysql.pdo.tdd')[0];

        for ($i = 0; $i < $this->rate; $i++) {
            $stmt = $pdo->prepare(
                'INSERT INTO `image` ('
                    . '`id`, '
                    . '`label`, '
                    . '`jpeg`, '
                    . '`date_created` '
                    . 'VALUES('
                    . ':id, '
                    . ':label, '
                    . ':jpeg, '
                    . ':date_created'
                    . ')'
            );
            $stmt->execute(
                [
                    ':id' => Uuid::uuid6(),
                    ':label' => hash('whirlpool', random_bytes(4)),
                    ':jpeg' => hash('whirlpool', random_bytes(5)),
                    ':date_created' => (new \DateTime())->format('Y-m-d H:i:s'),
                ]
            );
            echo 'test';
            die;
        }

        $imageModel = new ImageModel(
            $pdo,
            $container->get('mysql.pdo.tdd')[1],
            'image',
            'image_etl'
        );

        $response = $imageModel->process();

        $this->assertIsString($response['job']);
        $this->assertIsString($response['status']);

        $this->assertArrayHasKey('job', $response);
        $this->assertArrayHasKey('status', $response);

        $this->assertStringContainsString(ImageModel::class, $response['job']);
        $this->assertStringContainsString('OK', $response['status']);

    }
}
