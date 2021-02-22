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

use CRM\Controller\API\Relation\RelationPost;
use CRM\Model\Relation as ModelRelation;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    RelationPost::class,
    function () use ($container) {
        $relationPost = new RelationPost($container->get(ModelRelation::class));

        return $relationPost;
    }
);