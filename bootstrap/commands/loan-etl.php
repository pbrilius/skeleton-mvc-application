<?php

/**
 * CLI loader - commands
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */

use ETL\Model\LoanModel;
use Laminas\Diactoros\Stream;
use League\Container\Container;
use PBG\Command\LoanEtl;

/**
 * Container
 * 
 * @var Container $container Container
 */
$container->add(
    LoanEtl::class,
    function () use ($container) {
        $loanEtl = new LoanEtl(
            new Stream('php://input'),
            new Stream('php://output', 'w'),
            'pbg:cli.loan-etl',
            $container->get(LoanModel::class)
        );

        return $loanEtl;
    }
)->addTag('app.command')->addTag('pbg:cli.loan-etl');
