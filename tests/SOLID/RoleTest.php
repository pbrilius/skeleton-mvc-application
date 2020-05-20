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
namespace Tests;

use PBG\Entity\Role;
use PHPUnit\Framework\TestCase;

/**
 * Role unit
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class RoleTest extends TestCase
{
    /**
     * ID case
     *
     * @return void
     */
    public function testId(): void
    {
        $role = new Role();

        $this->assertObjectHasAttribute('_id', $role);
    }

    /**
     * Label case
     *
     * @return void
     */
    public function testLabel(): void
    {
        $role = new Role();

        $this->assertObjectHasAttribute('_label', $role);
    }

    /**
     * Pririty case
     *
     * @return void
     */
    public function testPriority(): void
    {
        $role = new Role();
        
        $this->assertObjectHasAttribute('_priority', $role);
    }
}