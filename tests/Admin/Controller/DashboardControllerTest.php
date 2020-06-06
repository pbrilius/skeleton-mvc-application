<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace Tests\Admin\Controller;

use Admin\Controller\Dashboard;
use App\Facilitator\BaseCrudUnit;
use Psr\Http\Message\ResponseInterface;

/**
 * Admin stack
 * 
 * @category Admin
 * @package  Dashboard
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class DashboardControllerTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $dashboard = $this
            ->getMockBuilder(Dashboard::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $dashboard
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $dashboard,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
