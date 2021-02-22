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
         * @var \PDO $pdoApp PDO
         */
        $pdoApp = $container->get('mysql.pdo.tdd')[0];
        /**
         * PDO
         * 
         * @var \PDO $pdoEtl PDO
         */
        $pdoEtl = $container->get('mysql.pdo.tdd')[1];

        $imageModel = new ImageModel(
            $pdoApp,
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

        $stmt = $pdoEtl->prepare(
            'SELECT COUNT(id) FROM image_etl'
        );
        $stmt->execute();

        $etlCheck = $stmt->fetchColumn();

        $this->assertGreaterThan(0, $etlCheck);

        $stmt = $pdoEtl->prepare(
            'SELECT * FROM image_etl LIMIT 1'
        );
        $stmt->execute();

        $etlContentCheck = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->assertStringNotMatchesFormat($this->uuidFormat, $etlContentCheck[0]['id']);
        $this->assertNotNull($etlContentCheck[0]['label']);
        $this->assertNotNull($etlContentCheck[0]['min']);
        $this->assertNotNull($etlContentCheck[0]['average']);
        $this->assertNotNull($etlContentCheck[0]['max']);

        $this->assertGreaterThanOrEqual(0, $etlContentCheck[0]['min']);
        $this->assertGreaterThanOrEqual(0, $etlContentCheck[0]['max']);
        $this->assertGreaterThanOrEqual(0, $etlContentCheck[0]['average']);
    }
}
