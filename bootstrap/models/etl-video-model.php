<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ETL
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ETL\Model\VideoModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    VideoModel::class,
    function () use ($container) {
        $videoModel = new VideoModel(
            $container->get('mysql.pdo')[0],
            $container->get('mysql.pdo')[1]
        );

        return $videoModel;
    }
);