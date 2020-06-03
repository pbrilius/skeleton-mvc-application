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
namespace Tests\B2C\Controller\API\Government;

use App\Facilitator\BaseApiUnit;
use B2B\Controller\API\Government\GovernmentPost;

/**
 * Government API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class GovernmentPostTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $govPost = $this
            ->getMockBuilder(GovernmentPost::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $govPost
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $govPost,
            $this->requestMock,
            []
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
}