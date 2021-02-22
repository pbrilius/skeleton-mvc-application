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

use ERP\Controller\API\Plan\PlanDelete;
use ERP\Model\Plan;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PlanDelete::class,
    function () use ($container) {
        $planDelete = new PlanDelete($container->get(Plan::class));

        return $planDelete;
    }
);