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
namespace TEsts\PBG\Model;

use PBG\Model\Api;
use PHPUnit\Framework\TestCase;

/**
 * Model PBG stack
 * 
 * @category Unit_Cases
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ApiTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $api = $this
            ->getMockBuilder(Api::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $this->assertObjectHasAttribute('table', $api);
        $this->assertClassHasAttribute('table', API::class);
    }
}