<?php

/**
 * PHP version 7
 * 
 * @category TDD
 * @package  Simulation
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\ERP\Command;

use ERP\Command\ModulesFront;
use PHPUnit\Framework\TestCase;

/**
 * Modules CLI
 * 
 * @category Unit_Cases
 * @package  Front
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ModulesFrontTest extends TestCase
{
    /**
     * Execution case
     *
     * @return void
     */
    public function testExecute(): void
    {
        $modulesFront = $this
            ->getMockBuilder(ModulesFront::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->getMock();

        $modulesFront
            ->expects($this->once())
            ->method('execute');

        $this->assertNull($modulesFront->execute());
    }
}