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

use Laminas\Diactoros\Stream;
use League\Container\Container;
use PBG\Command\FillUpBaseEtl;

/**
 * Container
 * 
 * @var Container $container Container
 */
$container->add(
    FillUpBaseEtl::class,
    function () {
        $etlBase = new FillUpBaseEtl(
            new Stream('php://input'),
            new Stream('php://output', 'w'),
            'pbg:cli.fill-up-etl-base'
        );

        return $etlBase;
    }
)->addTag('app.command')->addTag('pbg:cli.fill-up-etl-base');
