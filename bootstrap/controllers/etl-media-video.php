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

use ETL\Controller\MediaVideoController;
use ETL\Model\VideoModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    MediaVideoController::class,
    function () use ($container) {
        $mediaVideoController = new MediaVideoController($container->get(VideoModel::class));

        return $mediaVideoController;
    }
);