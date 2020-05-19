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

use PBG\Entity\Attribute;
use PHPUnit\Framework\TestCase;

/**
 * SOLID API test case
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AttributeTest extends TestCase
{
    /**
     * Attribute contains ID
     *
     * @return void
     */
    public function testIdProperty()
    {
        $attribute = new Attribute();

        $this->assertObjectHasAttribute('_id', $attribute);
    }

    /**
     * Label proeprty test
     *
     * @return void
     */
    public function testLabelProperty()
    {
        $attribute = new Attribute();

        $this->assertObjectHasAttribute('_label', $attribute);
    }

    /**
     * Priority property of entity
     *
     * @return void
     */
    public function testPriorityProperty()
    {
        $attribute = new Attribute();

        $this->assertObjectHasAttribute('_priority', $attribute);
    }
}