<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  CRM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use CRM\Model\Customer;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Customer::class,
    function () use ($container) {
        $customerModel = new Customer(
            $container->get('mysql.pdo')[5]
        );

        return $customerModel;
    }
);