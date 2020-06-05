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

use CRUD\View\Template;
use PHPUnit\Framework\TestCase;

/**
 * Base CRUD stack
 * 
 * @category Unit_Cases
 * @package  Template
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TemplateTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $template = $this
            ->getMockBuilder(Template::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disallowMockingUnknownTypes()
            ->setMethods(['throttle'])
            ->getMock();

        $template
            ->expects($this->atLeastOnce())
            ->method('throttle');

        $this->assertNull($template->throttle('test base template 1'));
        $this->assertNull($template->throttle('test base template 2'));
    }
}
