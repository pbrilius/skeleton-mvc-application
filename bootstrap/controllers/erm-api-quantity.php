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

use ERM\Controller\Quantity\Quantity;
use ERM\Model\Quantity as ModelQuantity;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Quantity::class,
    function () use ($container) {
        $quantity = new Quantity($container->get(ModelQuantity::class));

        return $quantity;
    }
);