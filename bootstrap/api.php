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

declare(strict_types=1);

use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use PBG\Controller\API\API\Api;
use PBG\Controller\API\API\ApiList;

$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$strategy = new JsonStrategy($responseFactory);

/**
 * Application router
 * 
 * @var Router $router
 */
$router->setStrategy($strategy);

$router->group(
    '/api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/api', $container->get(ApiList::class));
        $routeGroup->get('/api/{id:alphanum_dash}', $container->get(Api::class));
    }
);
