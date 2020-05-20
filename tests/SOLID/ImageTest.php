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

use PBG\Entity\Image;
use PHPUnit\Framework\TestCase;

/**
 * Image test case
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageTest extends TestCase
{
    /**
     * JPEG ID
     *
     * @return void
     */
    public function testIdAttribute()
    {
        $jpeg = new Image();

        $this->assertObjectHasAttribute('_id', $jpeg);
    }

    /**
     * Label
     *
     * @return void
     */
    public function testLabelAttribute()
    {
        $jpeg = new Image();

        $this->assertObjectHasAttribute('_label', $jpeg);
    }

    /**
     * JPEG itself
     *
     * @return void
     */
    public function testJPEGAttribute()
    {
        $jpeg = new Image();

        $this->assertObjectHasAttribute('_jpeg', $jpeg);
    }

}