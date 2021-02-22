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
namespace Tests\C2C\Controller\API\Transaction;

use App\Facilitator\BaseApiUnit;
use C2C\Controller\API\Transaction\TransactionList;

/**
 * Transaction API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionListTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $transactionList = $this
            ->getMockBuilder(TransactionList::class)
            ->disableOriginalConstructor()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $transactionList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $transactionList,
            $this->requestMock,
            []
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
}