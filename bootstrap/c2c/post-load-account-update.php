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

use C2C\Controller\API\Account\AccountUpdate;
use League\Container\Container;
use PBG\Model\Account;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    AccountUpdate::class,
    function () use ($container) {
        $accountUpdate = new AccountUpdate($container->get(Account::class));

        return $accountUpdate;
    }
);