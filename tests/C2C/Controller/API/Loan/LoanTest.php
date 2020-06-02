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
namespace Tests\C2C\Controller\API\Loan;

use App\Facilitator\BaseApiUnit;
use C2C\Controller\API\Loan\Loan;

/**
 * Loan API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LoanTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocatio(): void
    {
        $loan = $this
            ->getMockBuilder(Loan::class)
            ->disableOriginalConstructor()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $loan
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $repsonse = call_user_func(
            $loan,
            $this->requestMock,
            []
        );

        $this->assertIsArray($repsonse);
        $this->assertGreaterThanOrEqual(0, $repsonse);
    }
}