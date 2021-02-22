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
use PBG\Controller\API\Image\Image;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Image::class,
    function () use ($container) {
        $image = new Image($container->get('mysql.pdo')[0]);

        return $image;
    }
);