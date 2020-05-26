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
namespace Tests\ETL;

use ETL\BaseModelStatuses;
use PHPUnit\Framework\TestCase;

/**
 * Base ETL stack
 * 
 * @category Unit_Cases
 * @package  Base_Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseModelStatusesTest extends TestCase
{
    /**
     * Assertions on constants
     *
     * @return void
     */
    public function testContainsDefinitions(): void
    {
        $baseModelStatuses = new BaseModelStatuses();
        
        $this->assertIsObject($baseModelStatuses);
    }
}