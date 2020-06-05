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

use CRUD\View\TemplateTrait;
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
class TemplateTraitTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisite(): void
    {
        $templateTrait = $this
            ->getMockBuilder(TemplateTrait::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->getMockForTrait();

        $this->assertObjectNotHasAttribute('_variables', $templateTrait);
        $this->assertObjectNotHasAttribute('_interpretation', $templateTrait);
    }
}
