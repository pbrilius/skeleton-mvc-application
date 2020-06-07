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

namespace User\Controller\Transaction;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * User stack
 * 
 * @category Admin
 * @package  Transaction
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionsTest extends BaseCrudUnit
{
    /**
     * CE
     *
     * @return void
     */
    public function testCm(): void
    {
        $transactions = $this
            ->getMockBuilder(Transactions::class)
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $transactions
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $transactions,
            $this->requestMock,
            []
        );

        $this->assertIsNotIterable($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $transactions);
        $this->assertObjectNotHasAttribute('_templateEngine', $transactions);
        $this->assertClassNotHasAttribute('_cmsModel', Transactions::class);
        $this->assertClassNotHasAttribute('_templateEngine', Transactions::class);
        $this->assertIsCallable($transactions);
    }
}
