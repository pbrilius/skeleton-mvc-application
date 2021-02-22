<?php

/**
 * CMS routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_CMS
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
declare(strict_types=1);

use C2C\Controller\API\Account\Account;
use C2C\Controller\API\Account\AccountDelete;
use C2C\Controller\API\Account\AccountList;
use C2C\Controller\API\Account\AccountPost;
use C2C\Controller\API\Account\AccountUpdate;
use C2C\Controller\API\Currency\Currency;
use C2C\Controller\API\Currency\CurrencyDelete;
use C2C\Controller\API\Currency\CurrencyList;
use C2C\Controller\API\Currency\CurrencyPost;
use C2C\Controller\API\Currency\CurrencyUpdate;
use C2C\Controller\API\Loan\Loan;
use C2C\Controller\API\Loan\LoanDelete;
use C2C\Controller\API\Loan\LoanList;
use C2C\Controller\API\Loan\LoanPost;
use C2C\Controller\API\Loan\LoanUpdate;
use C2C\Controller\API\Transaction\Transaction;
use C2C\Controller\API\Transaction\TransactionDelete;
use C2C\Controller\API\Transaction\TransactionList;
use C2C\Controller\API\Transaction\TransactionPost;
use C2C\Controller\API\Transaction\TransactionUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Strategy\JsonStrategy;

$strategy = new JsonStrategy(new ResponseFactory());

$router->group(
    '/c2c-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/loan', $container->get(LoanList::class));
        $routeGroup->get('/loan/{id:alphanum_dash}', $container->get(Loan::class));
        $routeGroup->post('/loan', $container->get(LoanPost::class));
        $routeGroup->delete('/loan/{id:alphanum_dash}', $container->get(LoanDelete::class));
        $routeGroup->put('/loan/{id:alphanum_dash}', $container->get(LoanUpdate::class));
        
        $routeGroup->map('GET', '/account', $container->get(AccountList::class));
        $routeGroup->get('/account/{id:alphanum_dash}', $container->get(Account::class));
        $routeGroup->post('/account', $container->get(AccountPost::class));
        $routeGroup->delete('/account/{id:alphanum_dash}', $container->get(AccountDelete::class));
        $routeGroup->put('/account/{id:alphanum_dash}', $container->get(AccountUpdate::class));
        
        $routeGroup->map('GET', '/transaction', $container->get(TransactionList::class));
        $routeGroup->get('/transaction/{id:alphanum_dash}', $container->get(Transaction::class));
        $routeGroup->post('/transaction', $container->get(TransactionPost::class));
        $routeGroup->delete('/transaction/{id:alphanum_dash}', $container->get(TransactionDelete::class));
        $routeGroup->put('/transaction/{id:alphanum_dash}', $container->get(TransactionUpdate::class));
        
        $routeGroup->map('GET', '/currency', $container->get(CurrencyList::class));
        $routeGroup->get('/currency/{id:alphanum_dash}', $container->get(Currency::class));
        $routeGroup->post('/currency', $container->get(CurrencyPost::class));
        $routeGroup->delete('/currency/{id:alphanum_dash}', $container->get(CurrencyDelete::class));
        $routeGroup->put('/currency/{id:alphanum_dash}', $container->get(CurrencyUpdate::class));
    }
);