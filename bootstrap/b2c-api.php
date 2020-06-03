<?php

/**
 * B2B routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_B2C
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use B2C\Controller\API\Business\Business;
use B2C\Controller\API\Business\BusinessDelete;
use B2C\Controller\API\Business\BusinessList;
use B2C\Controller\API\Business\BusinessPost;
use B2C\Controller\API\Business\BusinessUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Strategy\JsonStrategy;

$strategy = new JsonStrategy(new ResponseFactory());

$router->group(
    '/b2c-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/business', $container->get(BusinessList::class));
        $routeGroup->get('/business/{id:alphanum_dash}', $container->get(Business::class));
        $routeGroup->post('/business', $container->get(BusinessPost::class));
        $routeGroup->delete('/business/{id:alphanum_dash}', $container->get(BusinessDelete::class));
        $routeGroup->put('/business/{id:alphanum_dash}', $container->get(BusinessUpdate::class));
    }
);
