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

use ETL\BaseControllerTrait;
use ETL\BaseModelInterface;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

/**
 * Base ETL stack
 * 
 * @category Unit_Cases
 * @package  Base_Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseControllerTraitTest extends FrameworkTestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseControllerTrait = $this
            ->getMockBuilder(BaseControllerTrait::class)
            ->getMockForTrait();

        $this->assertNull($baseControllerTrait->getEtlModel());
    }
}