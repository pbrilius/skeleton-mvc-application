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

use C2C\Controller\API\Loan\Loan;
use League\Container\Container;
use PBG\Model\Loan as ModelLoan;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Loan::class,
    function () use ($container) {
        $loan = new Loan($container->get(ModelLoan::class));

        return $loan;
    }
);