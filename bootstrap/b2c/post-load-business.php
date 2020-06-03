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

use B2C\Controller\API\Business\Business;
use B2C\Model\Business as ModelBusiness;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Business::class,
    function () use ($container) {
        $business = new Business($container->get(ModelBusiness::class));

        return $business;
    }
);