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

use C2C\Controller\API\Currency\CurrencyList;
use League\Container\Container;
use PBG\Model\Currency;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    CurrencyList::class,
    function () use ($container) {
        $currencyList = new CurrencyList($container->get(Currency::class));

        return $currencyList;
    }
);