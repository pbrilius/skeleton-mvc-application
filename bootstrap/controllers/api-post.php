<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  Launch
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use League\Container\Container;
use PBG\Controller\API\API\ApiPost;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    ApiPost::class,
    function () use ($container) {
        $api = new ApiPost($container->get('mysql.pdo')[0]);

        return $api;
    }
);