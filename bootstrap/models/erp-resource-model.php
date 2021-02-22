<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ERP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ERP\Model\Resource;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Resource::class,
    function () use ($container) {
        $resource = new Resource(
            $container->get('mysql.pdo')[3]
        );

        return $resource;
    }
);