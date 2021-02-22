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
use PBG\Controller\API\Video\VideoList;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    VideoList::class,
    function () use ($container) {
        $videoList = new VideoList($container->get('mysql.pdo')[0]);

        return $videoList;
    }
);