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
namespace Tests\CMS;

use CMS\BaseControllerTrait;
use CMS\BaseModelInterface;
use PHPUnit\Framework\TestCase;

/**
 * Base CMS stack
 * 
 * @category Unit_Cases
 * @package  Base_Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseControllerTraitTest extends TestCase
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
            ->setMethods(['getCmsModel'])
            ->getMockForTrait();

        $baseControllerTrait
            ->expects($this->once())
            ->method('getCmsModel')
            ->willReturn($this->prophesize(BaseModelInterface::class)->reveal());

        $this->assertInstanceOf(BaseModelInterface::class, $baseControllerTrait->getCmsModel());
    }
}