<?php

/**
 * Essential configuration file
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Container
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
$definitions = [
    'app.root' => __DIR__ . '/..',
];
$definitions['app.logs'] = $definitions['app.root'] . '/logs';
$definitions['app.cache'] = $definitions['app.root'] . '/cache';
$definitions['app.templates'] = $definitions['app.root'] . '/templates';

$container->add('app.root', $definitions['app.root']);
$container->add('app.src', $definitions['app.root'] . '/src');
$container->add('app.cache', $definitions['app.cache']);
$container->add('app.templates', $definitions['app.templates']);

$container->add(
    'db.config',
    [
        'host' => 'localhost',
        'port' => 3306,
        'database' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
);
