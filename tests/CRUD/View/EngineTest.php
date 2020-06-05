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

namespace Tests\CRUD\View;

use CRUD\View\Engine;
use PHPUnit\Framework\TestCase;

/**
 * Base CRUD stack
 * 
 * @category Unit_Cases
 * @package  Engine
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class EngineTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $engine = $this
            ->getMockBuilder(Engine::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disallowMockingUnknownTypes()
            ->setMethods(['parse', '_load'])
            ->getMock();

        $engine
            ->expects($this->atLeastOnce())
            ->method('parse')
            ->willReturn('test interpretation 1', 'test interpretation 2');

        $engine
            ->expects($this->never())
            ->method('_load');

        $this->assertStringContainsString('test interpretation 1', $engine->parse('test template 1', []));
        $this->assertStringContainsString('test interpretation 2', $engine->parse('test template 2', []));
    }
}
