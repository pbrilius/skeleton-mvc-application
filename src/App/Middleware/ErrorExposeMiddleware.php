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

use Laminas\Diactoros\Response;
use Laminas\Diactoros\Stream;
use Psr\Http\Server\MiddlewareInterface;

/**
 * Error response middleware
 * 
 * @category Middleware
 * @package  Content_Length
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ErrorExposeMiddleware implements MiddlewareInterface
{
    /**
     * HTTP error response of JSON format
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler Response
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        try {
            /**
             * Response
             * 
             * @var Response $response Response
             */
            $response = $handler->handle($request);
            
            return $response;
        } catch (\Exception $e) {
            $json = [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
            $encodedExcerpt = json_encode($json);
            $stream = new Stream('php://memory', 'w');
            $stream->write($encodedExcerpt);

            $response = new Response($stream, 500);

            return $response;
        }
    }
}