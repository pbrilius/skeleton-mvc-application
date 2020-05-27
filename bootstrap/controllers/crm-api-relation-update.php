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

use CRM\Controller\API\Relation\RelationUpdate;
use CRM\Model\Relation as ModelRelation;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    RelationUpdate::class,
    function () use ($container) {
        $relationUpdate = new RelationUpdate($container->get(ModelRelation::class));

        return $relationUpdate;
    }
);