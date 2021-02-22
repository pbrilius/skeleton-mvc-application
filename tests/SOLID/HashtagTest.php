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

use PBG\Entity\Hashtag;
use PHPUnit\Framework\TestCase;

/**
 * SOLID Hashtag test case
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class HashtagTest extends TestCase
{
    /**
     * ID property test
     *
     * @return void
     */
    public function testIdProperty(): void
    {
        $hashtag = new Hashtag();

        $this->assertObjectHasAttribute('_id', $hashtag);
    }

    /**
     * Label property test
     *
     * @return void
     */
    public function testLabelProperty(): void
    {
        $hashtag = new Hashtag();

        $this->assertObjectHasAttribute('_label', $hashtag);
    }

    
}