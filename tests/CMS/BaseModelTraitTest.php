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
namespace Test\CMS;

use CMS\BaseModelTrait;
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
class BaseModelTraitTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseModelTrait = $this
            ->getMockBuilder(BaseModelTrait::class)
            ->setMethods(['getPdo'])
            ->getMockForTrait();

        $baseModelTrait
            ->expects($this->once())
            ->method('getPdo')
            ->willReturn($this->prophesize(\PDO::class)->reveal());

        $this->assertInstanceOf(\PDO::class, $baseModelTrait->getPdo());

    }
}