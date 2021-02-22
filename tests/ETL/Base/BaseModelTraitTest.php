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

use ETL\BaseModelTrait;
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
class BaseModelTraitTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseModelTrait = $this
            ->getMockBuilder(BaseModelTrait::class)
            ->getMockForTrait();

        $this->assertNull($baseModelTrait->getPdoBase());
        $this->assertNull($baseModelTrait->getPdoEtl());
        
        $this->assertObjectHasAttribute('limit', $baseModelTrait);
        $this->assertObjectHasAttribute('sumSprint', $baseModelTrait);
        $this->assertObjectNotHasAttribute('_tableBase', $baseModelTrait);
        $this->assertObjectNotHasAttribute('_tableEtl', $baseModelTrait);
    }
}
