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

use ERP\Command\ModulesFront;
use Laminas\Diactoros\Stream;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container Container
 */

global $modules;

$container->add(
    ModulesFront::class,
    function () use ($modules) {
        $modulesFront = new ModulesFront(
            new Stream('php://input'),
            new Stream('php://output', 'w'),
            'pbg:cli.modules-front',
            $modules
        );

        return $modulesFront;
    }
)->addTag('app.command')->addTag('pbg:cli.modules-front');
