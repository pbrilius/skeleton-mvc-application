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

namespace Tests\CRM\Controller\API\Customer;

use App\Facilitator\BaseApiUnit;
use CRM\Controller\API\Customer\Customer;

/**
 * Customer API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CustomerTest extends BaseApiUnit
{
    /**
     * CMS callback
     *
     * @return void
     */
    public function testCallback(): void
    {
        $customer = $this
            ->getMockBuilder(Customer::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $customer
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $customer,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}
