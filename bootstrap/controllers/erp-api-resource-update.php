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

use ERP\Controller\API\Resource\ResourceUpdate;
use ERP\Model\Resource;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    ResourceUpdate::class,
    function () use ($container) {
        $resourceUpdate = new ResourceUpdate($container->get(Resource::class));

        return $resourceUpdate;
    }
);