<?php

/**
 * Front routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Front_Middlewares
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

declare(strict_types=1);

use App\Middleware\ErrorExposeMiddleware;
use App\Middleware\RequestLoggingMiddleware;
use League\Container\Container;
use League\Route\Router;

/**
 * Router
 * 
 * @var Router $router
 * @var Container $container
 */
$router->middleware(new ErrorExposeMiddleware());
$router->middleware($container->get(RequestLoggingMiddleware::class));