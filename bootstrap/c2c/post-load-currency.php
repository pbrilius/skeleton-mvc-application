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

use C2C\Controller\API\Currency\Currency;
use League\Container\Container;
use PBG\Model\Currency as ModelCurrency;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Currency::class,
    function () use ($container) {
        $currency = new Currency($container->get(ModelCurrency::class));

        return $currency;
    }
);