<?php

/**
 * API routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_ETL
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use ETL\Controller\MediaImageController;
use ETL\Controller\MediaVideoController;
use ETL\Controller\MediaVoiceController;
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
    '/etl',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->get('/media-image', $container->get(MediaImageController::class));
        $routeGroup->get('/media-voice', $container->get(MediaVoiceController::class));
        $routeGroup->get('/media-video', $container->get(MediaVideoController::class));
    }
)->setName('etl');