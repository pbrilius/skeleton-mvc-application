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
use User\Controller\Transaction\TransactionDelete;

/**
 * User stack
 * 
 * @category Admin
 * @package  Transaction
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionDeletTest extends BaseCrudUnit
{
    /**
     * CE case
     *
     * @return void
     */
    public function testCe(): void
    {
        $transactionDelete = $this
            ->getMockBuilder(TransactionDelete::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $transactionDelete
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $transactionDelete,
            $this->requestMock,
            []
        );

        $this->assertIsNotIterable($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertNotEmpty($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $transactionDelete);
        $this->assertObjectNotHasAttribute('_templateEngine', $transactionDelete);
        $this->assertClassNotHasAttribute('_cmsModel', TransactionDelete::class);
        $this->assertClassNotHasAttribute('_templateEngine', TransactionDelete::class);
        $this->assertIsCallable($transactionDelete);
    }
}
