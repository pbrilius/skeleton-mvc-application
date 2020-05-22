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
use PBG\Controller\API\API\APIDelete;
use PBG\Controller\API\API\ApiList;
use PBG\Controller\API\API\ApiPost;
use PBG\Controller\API\API\APIUpdate;

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
        $routeGroup->post('/api', $container->get(ApiPost::class));
        $routeGroup->delete('/api/{id:alphanum_dash}', $container->get(APIDelete::class));
        $routeGroup->put('/api/{id:alphanum_dash}', $container->get(APIUpdate::class));
    }
);
