<?php

/**
 * API routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_Routes
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use Psr\Http\Message\ServerRequestInterface;

$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$strategy = new JsonStrategy($responseFactory);

/**
 * Application router
 * 
 * @var Router $router
 */
$router->setStrategy($strategy);

// map a route
$router->map(
    'GET',
    '/api',
    function (ServerRequestInterface $request): array {
        return [
            'title'   => 'My New Simple API',
            'version' => 1,
        ];
    }
);
