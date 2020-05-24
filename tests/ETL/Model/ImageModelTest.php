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

namespace Tests\ETL\Model;

use ETL\BaseModelStatuses;
use ETL\Model\ImageModel;
use PHPUnit\Framework\TestCase;

/**
 * High end ETL stack
 * 
 * @category Unit_Cases
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageModelTest extends TestCase
{
    /**
     * Defaults
     *
     * @return void
     */
    public function testReturnDefault(): void
    {
        $imageModel = $this
            ->getMockBuilder(ImageModel::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['process'])
            ->getMock();

        $imageModel
            ->expects($this->atLeastOnce())
            ->method('process')
            ->willReturn(
                [
                    'status' => BaseModelStatuses::OK,
                ]
            );

        $this->assertArrayHasKey(
            'status',
            $imageModel->process()
        );
        $this->assertArrayNotHasKey('job', $imageModel->process());
    }
}
