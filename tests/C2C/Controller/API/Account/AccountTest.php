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

namespace Tests\C2C\Controller\API\Account;

use App\Facilitator\BaseApiUnit;
use C2C\Controller\API\Account\Account;

/**
 * Account API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AccountTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $account = $this
            ->getMockBuilder(Account::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $account
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $account,
            $this->requestMock,
            [
                'id' => $this->id
            ]
        );

        $this->assertIsArray($response);
        $this->assertArrayNotHasKey('id', $response);
    }
}
