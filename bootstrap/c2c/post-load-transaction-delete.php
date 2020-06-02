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

use C2C\Controller\API\Transaction\TransactionDelete;
use League\Container\Container;
use PBG\Model\Transaction;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    TransactionDelete::class,
    function () use ($container) {
        $transactionDelete = new TransactionDelete($container->get(Transaction::class));

        return $transactionDelete;
    }
);