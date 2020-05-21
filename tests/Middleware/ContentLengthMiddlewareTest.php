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

use App\Middleware\ContentLengthMiddleware;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
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
class ContentLengthMiddlewareTest extends TestCase
{
    /**
     * Response type case
     *
     * @return void
     */
    public function testResponseType(): void
    {
        /**
         * Mock builder
         * 
         * @var MockBuilder $mockBuilder
         */
        $mockBuilder = $this->getMockBuilder(ContentLengthMiddleware::class);
        $middleware = $mockBuilder
            ->setMethods(['process'])
            ->getMock();
        
        $request = $this->prophesize(ServerRequestInterface::class);
        $handler = $this->prophesize(RequestHandlerInterface::class);

        $response = $middleware->process($request->reveal(), $handler->reveal());

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}