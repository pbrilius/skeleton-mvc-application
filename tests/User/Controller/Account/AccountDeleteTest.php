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
use User\Controller\Account\AccountDelete;

/**
 * User stack
 * 
 * @category Admin
 * @package  Account
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AccountDeleteTest extends BaseCrudUnit
{
    /**
     * Invoke case
     *
     * @return void
     */
    public function testInvoke(): void
    {
        $accountDelete = $this
            ->getMockBuilder(AccountDelete::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableAutoReturnValueGeneration()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $accountDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $accountDelete,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $accountDelete);
        $this->assertObjectNotHasAttribute('_templateEngine', $accountDelete);
        $this->assertClassNotHasAttribute('_cmsModel', AccountDelete::class);
        $this->assertClassNotHasAttribute('_templateEngine', AccountDelete::class);
        $this->assertIsCallable($accountDelete);
    }
}
