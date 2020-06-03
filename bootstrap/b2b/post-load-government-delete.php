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

use B2B\Controller\API\Government\GovernmentDelete;
use B2B\Model\Government;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    GovernmentDelete::class,
    function () use ($container) {
        $govDelete = new GovernmentDelete($container->get(Government::class));

        return $govDelete;
    }
);