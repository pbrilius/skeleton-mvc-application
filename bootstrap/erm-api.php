<?php

/**
 * ERP routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_ERM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use ERM\Controller\API\Quality\Quality;
use ERM\Controller\API\Quality\QualityDelete;
use ERM\Controller\API\Quality\QualityList;
use ERM\Controller\API\Quality\QualityPost;
use ERM\Controller\API\Quality\QualityUpdate;
use ERM\Controller\API\Quantity\QuantityDelete;
use ERM\Controller\API\Quantity\QuantityList;
use ERM\Controller\API\Quantity\QuantityPost;
use ERM\Controller\API\Quantity\QuantityUpdate;
use ERM\Controller\Quantity\Quantity;
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
    '/erm-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/quality', $container->get(QualityList::class));
        $routeGroup->get('/quality/{id:alphanum_dash}', $container->get(Quality::class));
        $routeGroup->post('/quality', $container->get(QualityPost::class));
        $routeGroup->delete('/quality/{id:alphanum_dash}', $container->get(QualityDelete::class));
        $routeGroup->put('/quality/{id:alphanum_dash}', $container->get(QualityUpdate::class));
        
        $routeGroup->map('GET', '/quantity', $container->get(QuantityList::class));
        $routeGroup->get('/quantity/{id:alphanum_dash}', $container->get(Quantity::class));
        $routeGroup->post('/quantity', $container->get(QuantityPost::class));
        $routeGroup->delete('/quantity/{id:alphanum_dash}', $container->get(QuantityDelete::class));
        $routeGroup->put('/quantity/{id:alphanum_dash}', $container->get(QuantityUpdate::class));
    }
);
