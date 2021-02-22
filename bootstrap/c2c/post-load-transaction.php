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

use C2C\Controller\API\Transaction\Transaction;
use League\Container\Container;
use PBG\Model\Transaction as ModelTransaction;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Transaction::class,
    function () use ($container) {
        $transaction = new Transaction($container->get(ModelTransaction::class));

        return $transaction;
    }
);