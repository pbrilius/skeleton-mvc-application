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

use B2C\Controller\API\Business\BusinessDelete;
use B2C\Model\Business;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    BusinessDelete::class,
    function () use ($container) {
        $businessDelete = new BusinessDelete($container->get(Business::class));

        return $businessDelete;
    }
);