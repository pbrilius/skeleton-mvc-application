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

use ERM\Controller\Quality\Quality;
use ERM\Controller\Quality\QualityDelete;
use ERM\Controller\Quality\QualityList;
use ERM\Controller\Quality\QualityPost;
use ERM\Controller\Quality\QualityUpdate;
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
    }
);
