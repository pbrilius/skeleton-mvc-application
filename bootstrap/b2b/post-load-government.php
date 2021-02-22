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

use B2B\Controller\API\Government\Government;
use B2B\Model\Government as ModelGovernment;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Government::class,
    function () use ($container) {
        $gov = new Government($container->get(ModelGovernment::class));

        return $gov;
    }
);