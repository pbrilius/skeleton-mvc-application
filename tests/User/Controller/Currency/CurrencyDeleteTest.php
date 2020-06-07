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
use User\Controller\Currency\CurrencyDelete;

/**
 * User stack
 * 
 * @category Admin
 * @package  Currency
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CurrencyDeleteTest extends BaseCrudUnit
{
    /**
     * Invocatoin case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $currencyDelete = $this
            ->getMockBuilder(CurrencyDelete::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $currencyDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn($this->createStub(ResponseInterface::class));

        $response = call_user_func(
            $currencyDelete,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $currencyDelete);
        $this->assertObjectNotHasAttribute('_templateEngine', $currencyDelete);
        $this->assertIsCallable($currencyDelete);
        $this->assertClassNotHasAttribute('_cmsModel', CurrencyDelete::class);
        $this->assertClassNotHasAttribute('_templateEngine', CurrencyDelete::class);
    }
}
