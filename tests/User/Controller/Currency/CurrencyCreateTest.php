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
use User\Controller\Currency\CurrencyCreate;

/**
 * User stack
 * 
 * @category Admin
 * @package  Currency
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CurrencyCreateTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvoke(): void
    {
        $currencyCreate = $this
            ->getMockBuilder(CurrencyCreate::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disallowMockingUnknownTypes()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $currencyCreate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $currencyCreate,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $currencyCreate);
        $this->assertObjectNotHasAttribute('_templateEngine', $currencyCreate);
        $this->assertIsCallable($currencyCreate);
        $this->assertClassNotHasAttribute('_cmsModel', CurrencyCreate::class);
        $this->assertClassNotHasAttribute('_templateEngine', CurrencyCreate::class);
    }
}
