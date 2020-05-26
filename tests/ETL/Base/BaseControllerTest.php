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

use ETL\BaseController;
use ETL\BaseModel;
use ETL\BaseModelInterface;
use PHPUnit\Framework\MockObject\Builder\InvocationMocker;
use PHPUnit\Framework\MockObject\ConfigurableMethod;
use PHPUnit\Framework\MockObject\Invocation;
use PHPUnit\Framework\MockObject\InvocationHandler;
use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Type;

/**
 * Base ETL stack
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
            ->setMethods(['getEtlModel'])
            ->getMockForAbstractClass();

        $baseController
            ->expects($this->once())
            ->method('getEtlModel')
            ->willReturn($this->prophesize(BaseModelInterface::class)->reveal());

        $this->assertInstanceOf(BaseModelInterface::class, $baseController->getEtlModel());
    }
}
