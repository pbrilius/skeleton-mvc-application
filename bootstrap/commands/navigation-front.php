<?php

/**
 * CLI loader - commands
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */

use ERM\Command\NavigationFront;
use Laminas\Diactoros\Stream;
use League\Container\Container;
use League\Route\Router;

/**
 * Container
 * 
 * @var Container $container Container
 */
$container->add(
    NavigationFront::class,
    function () use ($container) {
        $navigationFront = new NavigationFront(
            new Stream('php://input'),
            new Stream('php://output', 'w'),
            'pbg:cli.navigation-front',
            $container->get(Router::class)
        );

        return $navigationFront;
    }
)->addTag('app.command')->addTag('pbg:cli.navigation-front');
