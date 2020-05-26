<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ERP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ERP\Model\Plan;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Plan::class,
    function () use ($container) {
        $plan = new Plan(
            $container->get('mysql.pdo')[3]
        );

        return $plan;
    }
);