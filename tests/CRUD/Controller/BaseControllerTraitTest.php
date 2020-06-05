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
namespace Tests\CRUD;

use CRUD\Controller\BaseControllerTrait;
use CRUD\View\EngineInterface;
use PHPUnit\Framework\TestCase;

/**
 * Base CRUD stack
 * 
 * @category Unit_Cases
 * @package  Base_Trait
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseControllerTraitTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseControllerTrait = $this
            ->getMockBuilder(BaseControllerTrait::class)
            ->setMethods(['getTemplateEngine'])
            ->getMockForTrait();

        $baseControllerTrait
            ->expects($this->once())
            ->method('getTemplateEngine')
            ->willReturn($this->prophesize(EngineInterface::class)->reveal());
            
        $this->assertInstanceOf(EngineInterface::class, $baseControllerTrait->getTemplateEngine());
    }
}