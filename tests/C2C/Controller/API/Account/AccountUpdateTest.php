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

namespace C2C\Controller\API\Account;

use App\Facilitator\BaseApiUnit;

/**
 * Account API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class AccountUpdateTest extends BaseApiUnit
{
    /**
     * INvocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $accountUpdate = $this
            ->getMockBuilder(AccountUpdate::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableAutoReturnValueGeneration()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $accountUpdate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $accountUpdate,
            $this->requestMock,
            [
                'id' => $this->id
            ]
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
}
