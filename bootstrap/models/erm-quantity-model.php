<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ERM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ERM\Model\Quantity;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Quantity::class,
    function () use ($container) {
        $quantityModel = new Quantity(
            $container->get('mysql.pdo')[4]
        );

        return $quantityModel;
    }
);