<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  C2C
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use League\Container\Container;
use PBG\Model\Currency;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Currency::class,
    function () use ($container) {
        $currency = new Currency(
            $container->get('mysql.pdo')[0]
        );

        return $currency;
    }
);