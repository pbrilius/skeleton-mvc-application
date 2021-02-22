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
namespace Tests\PBG\Model;

use PBG\Model\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * Model C2C stack
 * 
 * @category Unit_Cases
 * @package  Transaction
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class TransactionModelTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $transaction = $this
            ->getMockBuilder(Transaction::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $this->assertObjectHasAttribute('table', $transaction);
        $this->assertClassHasAttribute('table', Transaction::class);
    }
}