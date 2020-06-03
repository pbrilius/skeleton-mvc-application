<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  B2B
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use B2B\Model\Government;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Government::class,
    function () use ($container) {
        $government = new Government(
            $container->get('mysql.pdo')[0]
        );

        return $government;
    }
);