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
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Content length headered of HTTP sender response
 * 
 * @category Middleware
 * @package  Content_Length
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ContentLengthMiddleware implements MiddlewareInterface
{
    /**
     * HTTP Content Length header
     *
     * @param ServerRequestInterface  $request Server request
     * @param RequestHandlerInterface $handler Request handler
     * 
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $response = $response->withAddedHeader('Content-Length', strlen($response->getBody()));

        return $response;
    }
}