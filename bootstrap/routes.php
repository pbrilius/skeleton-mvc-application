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

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$router = new League\Route\Router;

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

require __DIR__ . '/api.php';
