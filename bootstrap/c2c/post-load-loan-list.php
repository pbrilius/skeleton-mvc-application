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

use C2C\Controller\API\Loan\LoanList;
use League\Container\Container;
use PBG\Model\Loan;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    LoanList::class,
    function () use ($container) {
        $loanList = new LoanList($container->get(Loan::class));

        return $loanList;
    }
);