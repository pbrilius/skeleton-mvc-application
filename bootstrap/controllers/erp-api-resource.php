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

use ERP\Controller\API\Resource\Resource;
use ERP\Model\Resource as ModelResource;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Resource::class,
    function () use ($container) {
        $resource = new Resource($container->get(ModelResource::class));

        return $resource;
    }
);