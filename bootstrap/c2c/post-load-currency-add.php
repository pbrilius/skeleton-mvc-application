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

use C2C\Controller\API\Currency\CurrencyPost;
use League\Container\Container;
use PBG\Model\Currency;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    CurrencyPost::class,
    function () use ($container) {
        $currencyPost = new CurrencyPost($container->get(Currency::class));

        return $currencyPost;
    }
);