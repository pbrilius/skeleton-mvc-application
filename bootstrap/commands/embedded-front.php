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

use ERP\Command\EmbeddedFront;
use Laminas\Diactoros\Stream;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container Container
 */
global $embedded;

$container->add(
    EmbeddedFront::class,
    function () use ($embedded) {
        $embeddedFront = new EmbeddedFront(
            new Stream('php://input'),
            new Stream('php://output'),
            'pbg:sli.embedded-front',
            $embedded
        );

        return $embeddedFront;
    }
)->addTag('app.command')->addTag('pbg:cli.embedded-front');
