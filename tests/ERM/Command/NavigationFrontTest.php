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
namespace Tests\ERM\Command;

use ERM\Command\NavigationFront;
use PHPUnit\Framework\TestCase;

/**
 * Command Navigation
 * 
 * @category Unit_Cases
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NavigationFrontTest extends TestCase
{
    /**
     * Execution case
     *
     * @return void
     */
    public function testExecution(): void
    {
        $navigationFront = $this
            ->getMockBuilder(NavigationFront::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->getMock();

        $navigationFront
            ->expects($this->once())
            ->method('execute');

        $this->assertNull($navigationFront->execute());
    }
}