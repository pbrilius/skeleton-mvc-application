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

use C2C\Controller\API\Transaction\TransactionList;
use League\Container\Container;
use PBG\Model\Transaction;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    TransactionList::class,
    function () use ($container) {
        $transactionList = new TransactionList($container->get(Transaction::class));

        return $transactionList;
    }
);