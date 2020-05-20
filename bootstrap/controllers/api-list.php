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
use PBG\Controller\API\API\ApiList;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    ApiList::class,
    function () use ($container) {
        $apiList = new ApiList($container->get('doctrine.em')[0]);

        return $apiList;
    }
);
