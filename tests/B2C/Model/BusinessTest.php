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
namespace Tests\B2C\Model;

use B2C\Model\Business;
use PHPUnit\Framework\TestCase;

/**
 * B2C stack
 * 
 * @category Unit_Cases
 * @package  Business
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BusinessTest extends TestCase
{
    /**
     * ORM case
     *
     * @return void
     */
    public function testOrm(): void
    {
        $business = $this
            ->getMockBuilder(Business::class)
            ->disableAutoReturnValueGeneration()
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->getMock();

        $this->assertObjectNotHasAttribute('table', $business);
        $this->assertClassNotHasAttribute('table', Business::class);
    }
}