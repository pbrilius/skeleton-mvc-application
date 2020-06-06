<?php

/**
 * PHP version 7
 * 
 * @category HTTP
 * @package  PSR_Middleware
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\Middleware;

use App\Middleware\RequestLoggingMiddleware;
use Laminas\HttpHandlerRunner\RequestHandlerRunner;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Request logging
 * 
 * @category Middleware
 * @package  Request_Logging
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class RequestLoggingMiddlewareTest extends TestCase
{
    /**
     * Request logging case
     *
     * @return void
     */
    public function testResponseType(): void
    {
        $middleware = $this
            ->getMockBuilder(RequestLoggingMiddleware::class)
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->disableAutoReturnValueGeneration()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->setMethods(['process'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class)->reveal();
        $handler = $this->prophesize(RequestHandlerInterface::class)->reveal();
        $response = $this->prophesize(ResponseInterface::class)->reveal();

        $middleware
            ->expects($this->atLeastOnce())
            ->method('process')
            ->willReturn($response);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $middleware->process($request, $handler)
        );
    }
}