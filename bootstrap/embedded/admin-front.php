<?php

/**
 * Admin routing
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

use Admin\Controller\Dashboard;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

$strategy = new ApplicationStrategy(new ResponseFactory);

/**
 * Router
 * 
 * @var Router $router Router
 */
$router->setStrategy($strategy);

$router->group(
    '/admin',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->get('/dashboard', $container->get(Dashboard::class));
    }
);
