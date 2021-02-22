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

namespace Tests\CRUD\Controller;

use CMS\BaseModelInterface;
use CRUD\Controller\BaseController;
use CRUD\View\EngineInterface;
use PHPUnit\Framework\TestCase;

/**
 * Base CRUD stack
 * 
 * @category Unit_Cases
 * @package  Base_Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseControllerTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseController = $this
            ->getMockBuilder(BaseController::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['getCmsModel', 'getTemplateEngine'])
            ->disableArgumentCloning()
            ->getMockForAbstractClass();

        $baseController
            ->expects($this->once())
            ->method('getCmsModel')
            ->willReturn($this->prophesize(BaseModelInterface::class)->reveal());

        $this->assertInstanceOf(BaseModelInterface::class, $baseController->getCmsModel());
        
        $baseController
            ->expects($this->once())
            ->method('getTemplateEngine')
            ->willReturn($this->prophesize(EngineInterface::class)->reveal());

        $this->assertInstanceOf(EngineInterface::class, $baseController->getTemplateEngine());
    }
}
