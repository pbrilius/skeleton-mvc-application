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
namespace Tests\ERP\Model;

use ERP\Model\Resource;
use PHPUnit\Framework\TestCase;

/**
 * Model CMS stack
 * 
 * @category Unit_Cases
 * @package  Category
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ResourceTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $resource = $this
            ->getMockBuilder(Resource::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $this->assertAttributeSame('resource', 'table', $resource);
    }
}