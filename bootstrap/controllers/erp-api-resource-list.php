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

use ERP\Controller\API\Resource\ResourceList;
use ERP\Model\Resource;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    ResourceList::class,
    function () use ($container) {
        $resourceList = new ResourceList($container->get(Resource::class));

        return $resourceList;
    }
);