<?php

/**
 * Hybrid engine loader
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */

use CRUD\View\Engine;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Engine::class,
    function () use ($container) {
        return new Engine($container->get('app.templates'));
    }
);