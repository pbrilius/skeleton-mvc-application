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
namespace Tests\ERP\Controller\API\Plan;

use ERP\Controller\API\Plan\PlanList;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Plan API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class PlanListTest extends TestCase
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $planList = $this
            ->getMockBuilder(PlanList::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $planList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $request = $this
            ->prophesize(ServerRequestInterface::class)
            ->reveal();

        $response = call_user_func(
            $planList,
            $request,
            []
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}