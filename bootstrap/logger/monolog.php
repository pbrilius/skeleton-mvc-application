<?php

/**
 * Logger load - boot up
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
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Log\LoggerInterface;

/**
 * Container
 * 
 * @var Container $container Container
 */

$container->add(
    LoggerInterface::class,
    function () use ($container) {
        $logRotor = new RotatingFileHandler(
            $container->get('app.logs') . '/general.log',
            $container->get('app.logs.max.files')
        );
        $uidProcessor = new UidProcessor();

        $logger = new Logger(
            $container->get('app.label'),
            [
                $logRotor,
            ],
            [
                $uidProcessor,
            ]
        );

        return $logger;
    }
)->setShared(true)->addTag('logger');