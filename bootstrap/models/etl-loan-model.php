<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ETL
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ETL\Model\LoanModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    LoanModel::class,
    function () use ($container) {
        $videoModel = new LoanModel(
            $container->get('mysql.pdo.tdd')[0],
            $container->get('mysql.pdo.tdd')[1],
            'loan',
            'loan_etl'
        );

        return $videoModel;
    }
);