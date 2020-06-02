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

use C2C\Controller\API\Transaction\TransactionUpdate;
use League\Container\Container;
use PBG\Model\Transaction;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    TransactionUpdate::class,
    function () use ($container) {
        $transactionUpdate = new TransactionUpdate($container->get(Transaction::class));

        return $transactionUpdate;
    }
);