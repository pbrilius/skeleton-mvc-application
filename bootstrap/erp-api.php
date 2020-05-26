<?php

/**
 * ERP routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_ERP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use ERP\Controller\API\Baseline\Baseline;
use ERP\Controller\API\Baseline\BaselineDelete;
use ERP\Controller\API\Baseline\BaselineList;
use ERP\Controller\API\Baseline\BaselinePost;
use ERP\Controller\API\Baseline\BaselineUpdate;
use ERP\Controller\API\Plan\Plan;
use ERP\Controller\API\Plan\PlanDelete;
use ERP\Controller\API\Plan\PlanList;
use ERP\Controller\API\Plan\PlanPost;
use ERP\Controller\API\Plan\PlanUpdate;
use ERP\Controller\API\Resource\Resource;
use ERP\Controller\API\Resource\ResourceDelete;
use ERP\Controller\API\Resource\ResourceList;
use ERP\Controller\API\Resource\ResourcePost;
use ERP\Controller\API\Resource\ResourceUpdate;
use ERP\Controller\API\Upperline\Upperline;
use ERP\Controller\API\Upperline\UpperlineDelete;
use ERP\Controller\API\Upperline\UpperlineList;
use ERP\Controller\API\Upperline\UpperlinePost;
use ERP\Controller\API\Upperline\UpperlineUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;

$strategy = new JsonStrategy(new ResponseFactory());

/**
 * Router
 * 
 * @var Router $router Router
 */
$router->setStrategy($strategy);

$router->group(
    '/erp-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/plan', $container->get(PlanList::class));
        $routeGroup->get('/plan/{id:alphanum_dash}', $container->get(Plan::class));
        $routeGroup->post('/plan', $container->get(PlanPost::class));
        $routeGroup->delete('/plan/{id:alphanum_dash}', $container->get(PlanDelete::class));
        $routeGroup->put('/plan/{id:alphanum_dash}', $container->get(PlanUpdate::class));
        
        $routeGroup->map('GET', '/baseline', $container->get(BaselineList::class));
        $routeGroup->get('/baseline/{id:alphanum_dash}', $container->get(Baseline::class));
        $routeGroup->post('/baseline', $container->get(BaselinePost::class));
        $routeGroup->delete('/baseline/{id:alphanum_dash}', $container->get(BaselineDelete::class));
        $routeGroup->put('/baseline/{id:alphanum_dash}', $container->get(BaselineUpdate::class));
        
        $routeGroup->map('GET', '/resource', $container->get(ResourceList::class));
        $routeGroup->get('/resource/{id:alphanum_dash}', $container->get(Resource::class));
        $routeGroup->post('/resource', $container->get(ResourcePost::class));
        $routeGroup->delete('/resource/{id:alphanum_dash}', $container->get(ResourceDelete::class));
        $routeGroup->put('/resource/{id:alphanum_dash}', $container->get(ResourceUpdate::class));
        
        $routeGroup->map('GET', '/upperline', $container->get(UpperlineList::class));
        $routeGroup->get('/upperline/{id:alphanum_dash}', $container->get(Upperline::class));
        $routeGroup->post('/upperline', $container->get(UpperlinePost::class));
        $routeGroup->delete('/upperline/{id:alphanum_dash}', $container->get(UpperlineDelete::class));
        $routeGroup->put('/upperline/{id:alphanum_dash}', $container->get(UpperlineUpdate::class));
    }
)->setName('erp-api');

