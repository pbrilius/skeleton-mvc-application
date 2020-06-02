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

use C2C\Controller\API\Loan\LoanDelete;
use League\Container\Container;
use PBG\Model\Loan;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    LoanDelete::class,
    function () use ($container) {
        $loanDelete = new LoanDelete($container->get(Loan::class));

        return $loanDelete;
    }
);