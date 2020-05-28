<?php

/**
 * TDD configuration file
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Container
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

$container->add(
    'db.tdd.config',
    [
        'host' => 'localhost',
        'port' => 3306,
        'database' => $_ENV['DB_DATABASE_TDD'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
);

$container->add(
    'db.tdd.etl.config',
    [
        'host' => 'localhost',
        'port' => 3306,
        'database' => $_ENV['DB_DATABASE_ETL_TDD'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
);