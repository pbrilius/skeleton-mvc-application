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

namespace Tests\User\Controller\Account;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use User\Controller\Account\Account;

/**
 * User stack
 * 
 * @category Admin
 * @package  Account
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AccountTest extends BaseCrudUnit
{
    /**
     * Invoke case
     *
     * @return void
     */
    public function testInvoke(): void
    {
        $account = $this
            ->getMockBuilder(Account::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableAutoReturnValueGeneration()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $account
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $account,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $account);
        $this->assertObjectNotHasAttribute('_templateEngine', $account);
        $this->assertClassNotHasAttribute('_cmsModel', Account::class);
        $this->assertClassNotHasAttribute('_templateEngine', Account::class);
        $this->assertIsCallable($account);
    }
}
