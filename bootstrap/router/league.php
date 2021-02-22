<?php

/**
 * League router loader
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */

use League\Container\Container;
use League\Route\Router;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Router::class,
    function () use ($container) {
        return new Router();
    }
);
