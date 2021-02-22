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

use ERP\Controller\API\Plan\Plan;
use ERP\Model\Plan as ModelPlan;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Plan::class,
    function () use ($container) {
        $plan = new Plan($container->get(ModelPlan::class));

        return $plan;
    }
);