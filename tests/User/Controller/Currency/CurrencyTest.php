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

namespace Tests\User\Controller\Currency;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use User\Controller\Currency\Currency;

/**
 * User stack
 * 
 * @category Admin
 * @package  Currency
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CurrencyTest extends BaseCrudUnit
{
    /**
     * Invoke case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $currency = $this
            ->getMockBuilder(Currency::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $currency
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $currency,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $currency);
        $this->assertObjectNotHasAttribute('_templateEngine', $currency);
        $this->assertIsCallable($currency);
        $this->assertClassNotHasAttribute('_cmsModel', Currency::class);
        $this->assertClassNotHasAttribute('_templateEngine', Currency::class);
    }
}
