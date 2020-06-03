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
namespace B2B\Controller\API\Government;

use App\Facilitator\BaseApiUnit;

/**
 * Government API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class GovernmentListTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $governmentList = $this
            ->getMockBuilder(GovernmentList::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $governmentList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $governmentList,
            $this->requestMock,
            []
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
} 