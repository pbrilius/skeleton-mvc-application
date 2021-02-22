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

use ERM\Controller\API\Quantity\QuantityDelete;
use ERM\Model\Quantity;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    QuantityDelete::class,
    function () use ($container) {
        $quantityDelete = new QuantityDelete($container->get(Quantity::class));

        return $quantityDelete;
    }
);