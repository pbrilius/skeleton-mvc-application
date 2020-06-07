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
use User\Controller\Account\AccountCreate;

/**
 * User stack
 * 
 * @category Admin
 * @package  Account
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AccountCreateTest extends BaseCrudUnit
{
    /**
     * Invoke case
     *
     * @return void
     */
    public function testInvoke(): void
    {
        $accountCreate = $this
            ->getMockBuilder(AccountCreate::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableAutoReturnValueGeneration()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $accountCreate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $accountCreate,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $response);
        $this->assertObjectNotHasAttribute('_templateEngine', $response);
        $this->assertClassNotHasAttribute('_cmsModel', AccountCreate::class);
        $this->assertClassNotHasAttribute('_templateEngine', AccountCreate::class);
        $this->assertIsCallable($accountCreate);
    }
}
