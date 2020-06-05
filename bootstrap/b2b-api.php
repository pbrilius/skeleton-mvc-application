<?php

/**
 * B2B routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_CMS
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use B2B\Controller\API\Government\Government;
use B2B\Controller\API\Government\GovernmentDelete;
use B2B\Controller\API\Government\GovernmentList;
use B2B\Controller\API\Government\GovernmentPost;
use B2B\Controller\API\Government\GovernmentUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;

$strategy = new JsonStrategy(new ResponseFactory());

/**
 * Router
 * 
 * @var Router $router
 */
$router->setStrategy($strategy);

$router->group(
    '/b2b-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/government', $container->get(GovernmentList::class));
        $routeGroup->get('/government/{id:alphanum_dash}', $container->get(Government::class));
        $routeGroup->post('/government', $container->get(GovernmentPost::class));
        $routeGroup->delete('/government/{id:alphanum_dash}', $container->get(GovernmentDelete::class));
        $routeGroup->put('/government/{id:alphanum_dash}', $container->get(GovernmentUpdate::class));
    }
);
