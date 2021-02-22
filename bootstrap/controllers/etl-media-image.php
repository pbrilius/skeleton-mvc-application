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

use ETL\Controller\MediaImageController;
use ETL\Model\ImageModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    MediaImageController::class,
    function () use ($container) {
        $mediaImageController = new MediaImageController($container->get(ImageModel::class));

        return $mediaImageController;
    }
);