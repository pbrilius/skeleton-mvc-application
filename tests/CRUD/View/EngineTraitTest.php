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

use CRUD\View\EngineTrait;
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
class EngineTraitTest extends TestCase
{
    /**
     * Atomics case - prerequisites
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $engineTrait = $this
            ->getMockBuilder(EngineTrait::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->getMockForTrait();

        $this->assertObjectNotHasAttribute('_templatePath', $engineTrait);
        $this->assertObjectHasAttribute('template', $engineTrait);
    }
}