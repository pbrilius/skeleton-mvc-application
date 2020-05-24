<?php

/**
 * Front routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Front_Routes
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use Laminas\Diactoros\ResponseFactory;
use League\Container\Container;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

/**
 * Container
 * 
 * @var Container $container
 */
$router = $container->get(Router::class);

$strategy = new ApplicationStrategy(new ResponseFactory);
$router->setStrategy($strategy);

// map a route
$router->map(
    'GET',
    '/',
    function (ServerRequestInterface $request): ResponseInterface {
        $response = new Laminas\Diactoros\Response;
        $response->getBody()->write('<h1>Hello, World!</h1>');
        return $response;
    }
);
