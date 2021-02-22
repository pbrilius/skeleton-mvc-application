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

use C2C\Controller\API\Loan\LoanUpdate;
use League\Container\Container;
use PBG\Model\Loan;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    LoanUpdate::class,
    function () use ($container) {
        $loanUpdate = new LoanUpdate($container->get(Loan::class));

        return $loanUpdate;
    }
);