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

use ERP\Controller\API\Upperline\UpperlineUpdate;
use ERP\Model\Upperline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    UpperlineUpdate::class,
    function () use ($container) {
        $upperlineUpdate = new UpperlineUpdate($container->get(Upperline::class));

        return $upperlineUpdate;
    }
);