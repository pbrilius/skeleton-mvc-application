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

namespace Tests\User\Controller\Transaction;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use User\Controller\Transaction\TransactionCreate;

/**
 * User stack
 * 
 * @category Admin
 * @package  Transaction
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionCreateTest extends BaseCrudUnit
{
    /**
     * CE case
     *
     * @return void
     */
    public function testCe(): void
    {
        $transactionCreate = $this
            ->getMockBuilder(TransactionCreate::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $transactionCreate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $transactionCreate,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $transactionCreate);
        $this->assertObjectNotHasAttribute('_templateEngine', $transactionCreate);
        $this->assertClassNotHasAttribute('_cmsModel', TransactionCreate::class);
        $this->assertClassNotHasAttribute('_templateEngine', TransactionCreate::class);
        $this->assertIsCallable($transactionCreate);
    }
}
