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
namespace Tests\B2B\Model;

use B2B\Model\Government;
use PHPUnit\Framework\TestCase;

/**
 * B2B stack
 * 
 * @category Unit_Cases
 * @package  Government
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class GovernmentTest extends TestCase
{
    /**
     * ORM case
     *
     * @return void
     */
    public function testOrm(): void
    {
        $government = $this
            ->getMockBuilder(Government::class)
            ->disableOriginalConstructor()
            ->disableAutoload()
            ->disableArgumentCloning()
            ->getMock();

        $this->assertObjectNotHasAttribute('table', $government);
        $this->assertClassNotHasAttribute('table', Government::class);
    }
}