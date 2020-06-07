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

namespace Tests\User\Controller\Loan;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use User\Controller\Loan\Loans;

/**
 * User stack
 * 
 * @category Admin
 * @package  Loan
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LoansTest extends BaseCrudUnit
{
    /**
     * Invoke case
     *
     * @return void
     */
    public function testInvoke(): void
    {
        $loans = $this
            ->getMockBuilder(Loans::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $loans
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $loans,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $loans);
        $this->assertObjectNotHasAttribute('_templateEngine', $loans);
        $this->assertIsCallable($loans);
        $this->assertClassNotHasAttribute('_cmsModel', Loans::class);
        $this->assertClassNotHasAttribute('_templateEngine', Loans::class);
    }
}
