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

use C2C\Controller\API\Account\Account;
use League\Container\Container;
use PBG\Model\Account as ModelAccount;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Account::class,
    function () use ($container) {
        $account = new Account($container->get(ModelAccount::class));

        return $account;
    }
);