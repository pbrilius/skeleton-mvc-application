<?php

/**
 * PDO boot loader
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */

declare(strict_types=1);

use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PDO::class,
    function () use ($container) {
        $dbConfig = $container->get('db.config');
        $pdo = new \PDO(
            'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['database'],
            $dbConfig['user'],
            $dbConfig['password'],
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            ]
        );

        return $pdo;
    }
)->addTag('mysql.pdo');

$container->add(
    PDO::class,
    function () use ($container) {
        $dbConfig = $container->get('db.etl.config');
        $pdo = new \PDO(
            'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['database'],
            $dbConfig['user'],
            $dbConfig['password'],
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            ]
        );

        return $pdo;
    }
)->addTag('mysql.pdo');
