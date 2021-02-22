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
namespace Tests\SOLID;

use PBG\Entity\Link;
use PHPUnit\Framework\TestCase;

/**
 * Link unit
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LinkTest extends TestCase
{
    /**
     * Link case
     *
     * @return void
     */
    public function testId()
    {
        $link = new Link();

        $this->assertObjectHasAttribute('_id', $link);
    }

    /**
     * Label case
     *
     * @return void
     */
    public function testLabel()
    {
        $link = new Link();

        $this->assertObjectHasAttribute('_label', $link);
    }

    /**
     * Reference case
     *
     * @return void
     */
    public function testReference()
    {
        $link = new Link();

        $this->assertObjectHasAttribute('_reference', $link);
    }

}