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

use PBG\Model\Transaction;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Transaction::class,
    function () use ($container) {
        $transaction = new Transaction(
            $container->get('mysql.pdo')[0]
        );

        return $transaction;
    }
);