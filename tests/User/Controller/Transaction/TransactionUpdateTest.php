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
class TransactionUpdateTest extends BaseCrudUnit
{
    /**
     * CE case
     *
     * @return void
     */
    public function testCe(): void
    {
        $transactionUpdate = $this
            ->getMockBuilder(TransactionUpdate::class)
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->setMethods(['__invoke'])
            ->getMock();

        $transactionUpdate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $transactionUpdate,
            $this->requestMock,
            []
        );

        $this->assertIsNotIterable($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertNotEmpty($response);
        $this->isInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $transactionUpdate);
        $this->assertObjectNotHasAttribute('_templateEngine', $transactionUpdate);
        $this->assertClassNotHasAttribute('_cmsModel', TransactionUpdate::class);
        $this->assertClassNotHasAttribute('_templateEngine', TransactionUpdate::class);
        $this->assertIsCallable($transactionUpdate);
    }
}
