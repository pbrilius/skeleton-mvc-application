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

use ERM\Controller\API\Quantity\QuantityList;
use ERM\Model\Quantity;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    QuantityList::class,
    function () use ($container) {
        $quantityList = new QuantityList($container->get(Quantity::class));

        return $quantityList;
    }
);