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
namespace Tests\CRM\Model;

use CRM\Model\Customer;
use PHPUnit\Framework\TestCase;

/**
 * Model CRM stack
 * 
 * @category Unit_Cases
 * @package  Customer
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CustomerTest extends TestCase
{
    /**
     * Implemntation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $customer = $this
            ->getMockBuilder(Customer::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $this->assertAttributeSame('customer', 'table', $customer);
    }
}