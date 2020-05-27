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

use CRM\Controller\API\Customer\CustomerDelete;
use CRM\Model\Customer as ModelCustomer;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    CustomerDelete::class,
    function () use ($container) {
        $customerDelete = new CustomerDelete($container->get(ModelCustomer::class));

        return $customerDelete;
    }
);