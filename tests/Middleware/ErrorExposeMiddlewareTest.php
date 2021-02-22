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

namespace Tests\Middleware;

use App\Middleware\ErrorExposeMiddleware;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Cpmtemt Length Middleware Unit
 * 
 * @category Unit_Cases
 * @package  Middleware
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ErrorExposeMiddlewareTest extends TestCase
{
    /**
     * Error middleware response type case
     *
     * @return void
     */
    public function testResponseType(): void
    {
        $middleware = $this
            ->getMockBuilder(ErrorExposeMiddleware::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['process'])
            ->getMock();
        
        $middleware
            ->expects($this->atLeastOnce())
            ->method('process')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $request = $this->prophesize(ServerRequestInterface::class);
        $handler = $this->prophesize(RequestHandlerInterface::class);

        $response = $middleware->process($request->reveal(), $handler->reveal());

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
