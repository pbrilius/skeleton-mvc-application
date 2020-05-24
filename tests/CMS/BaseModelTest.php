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
namespace Tests\CMS;

use CMS\BaseModel;
use PHPUnit\Framework\TestCase;

/**
 * Base CMS stack
 * 
 * @category Unit_Cases
 * @package  Base_Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseModelTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseModel = $this
            ->getMockBuilder(BaseModel::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['getPdo'])
            ->getMockForAbstractClass();

        $baseModel
            ->expects($this->once())
            ->method('getPdo')
            ->willReturn($this->prophesize(\PDO::class)->reveal());

        $this->assertInstanceOf(\PDO::class, $baseModel->getPdo());
    }
}