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

use Monolog\Logger;
use Psr\Http\Server\MiddlewareInterface;

/**
 * Request logging
 * 
 * @category Middleware
 * @package  Request_Logging
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class RequestLoggingMiddleware implements MiddlewareInterface
{
    /**
     * Logger
     *
     * @var Logger
     */
    private $_logger;

    /**
     * Logger constructor
     *
     * @param Logger $logger Logger
     */
    public function __construct(Logger $logger)
    {
        $this->_logger = $logger;
    }

    /**
     * Processing callback
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler Handler
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        $logger = $this->_logger;

        $logger->info(
            'Request called.',
            [
                'headers' => $request->getHeaders(),
            ]
        );
        $response = $handler->handle($request);

        return $response;
    }
}
