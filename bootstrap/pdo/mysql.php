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
            'mysql://' . $dbConfig['host'] . ':' . $dbConfig['port'] . '/' . $dbConfig['database'],
            $dbConfig['user'],
            $dbConfig['password']
        );
        var_export('mysql://' . $dbConfig['host'] . ':' . $dbConfig['port'] . '/' . $dbConfig['database']);

        return $pdo;
    }
)->addTag('mysql.pdo');
