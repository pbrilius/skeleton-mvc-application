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

use CRM\Controller\API\Relation\Relation;
use CRM\Model\Relation as ModelRelation;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Relation::class,
    function () use ($container) {
        $relation = new Relation($container->get(ModelRelation::class));

        return $relation;
    }
);