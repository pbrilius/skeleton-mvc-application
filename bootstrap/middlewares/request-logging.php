<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  C2C
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use App\Middleware\RequestLoggingMiddleware;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    RequestLoggingMiddleware::class,
    function () use ($container) {
        $logging = new RequestLoggingMiddleware($container->get('logger')[0]);

        return $logging;
    }
);