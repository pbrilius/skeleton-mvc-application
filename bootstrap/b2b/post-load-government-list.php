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

use B2B\Controller\API\Government\GovernmentList;
use B2B\Model\Government;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    GovernmentList::class,
    function () use ($container) {
        $govList = new GovernmentList($container->get(Government::class));

        return $govList;
    }
);