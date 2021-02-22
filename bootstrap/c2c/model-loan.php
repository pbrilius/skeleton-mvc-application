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

use PBG\Model\Currency;
use PBG\Model\Loan;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Loan::class,
    function () use ($container) {
        $loan = new Loan(
            $container->get('mysql.pdo')[0]
        );

        return $loan;
    }
);