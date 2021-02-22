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

use ERP\Controller\API\Plan\PlanPost;
use ERP\Model\Plan;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PlanPost::class,
    function () use ($container) {
        $planPost = new PlanPost($container->get(Plan::class));

        return $planPost;
    }
);