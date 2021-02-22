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

use ERP\Controller\API\Upperline\Upperline;
use ERP\Model\Upperline as ModelUpperline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Upperline::class,
    function () use ($container) {
        $upperline = new Upperline($container->get(ModelUpperline::class));

        return $upperline;
    }
);