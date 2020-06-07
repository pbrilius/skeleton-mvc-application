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
use User\Controller\Transaction\Transaction;

/**
 * User stack
 * 
 * @category Admin
 * @package  Transaction
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionTest extends BaseCrudUnit
{
    /**
     * CE case
     *
     * @return void
     */
    public function testCe(): void
    {
        $transaction = $this
            ->getMockBuilder(Transaction::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $transaction
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $transaction,
            $this->requestMock,
            []
        );

        $this->assertIsNotIterable($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertNotEmpty($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $transaction);
        $this->assertObjectNotHasAttribute('_templateEngine', $transaction);
        $this->assertClassNotHasAttribute('_cmsModel', Transaction::class);
        $this->assertClassNotHasAttribute('_templateEngine', Transaction::class);
        $this->assertIsCallable($transaction);
    }
}
