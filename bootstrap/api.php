<?php

use League\Route\Router;
use League\Route\Strategy\JsonStrategy;


$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$strategy = new JsonStrategy($responseFactory);

/**
 * @var Router $router
 */
$router->setStrategy($strategy);

// map a route
$router->map('GET', '/api', function (ServerRequestInterface $request) : array {
    return [
        'title'   => 'My New Simple API',
        'version' => 1,
    ];
});