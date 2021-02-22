<?php

/**
 * CRM routing
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

use CRM\Controller\API\Customer\Customer;
use CRM\Controller\API\Customer\CustomerDelete;
use CRM\Controller\API\Customer\CustomerList;
use CRM\Controller\API\Customer\CustomerPost;
use CRM\Controller\API\Customer\CustomerUpdate;
use CRM\Controller\API\Relation\Relation;
use CRM\Controller\API\Relation\RelationDelete;
use CRM\Controller\API\Relation\RelationList;
use CRM\Controller\API\Relation\RelationPost;
use CRM\Controller\API\Relation\RelationUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;

$strategy = new JsonStrategy(new ResponseFactory());

/**
 * Router
 * 
 * @var Router $router Router
 */
$router->setStrategy($strategy);

$router->group(
    '/crm-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/customer', $container->get(CustomerList::class));
        $routeGroup->get('/customer/{id:alphanum_dash}', $container->get(Customer::class));
        $routeGroup->post('/customer', $container->get(CustomerPost::class));
        $routeGroup->delete('/customer/{id:alphanum_dash}', $container->get(CustomerDelete::class));
        $routeGroup->put('/customer/{id:alphanum_dash}', $container->get(CustomerUpdate::class));
        
        $routeGroup->map('GET', '/relation', $container->get(RelationList::class));
        $routeGroup->get('/relation/{id:alphanum_dash}', $container->get(Relation::class));
        $routeGroup->post('/relation', $container->get(RelationPost::class));
        $routeGroup->delete('/relation/{id:alphanum_dash}', $container->get(RelationDelete::class));
        $routeGroup->put('/relation/{id:alphanum_dash}', $container->get(RelationUpdate::class));
    }
)->setName('crm-api');