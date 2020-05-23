<?php

/**
 * API routing
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  API_Routes
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

declare(strict_types=1);

use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use PBG\Controller\API\API\Api;
use PBG\Controller\API\API\APIDelete;
use PBG\Controller\API\API\ApiList;
use PBG\Controller\API\API\ApiPost;
use PBG\Controller\API\API\APIUpdate;
use PBG\Controller\API\Note\Note;
use PBG\Controller\API\Note\NoteDelete;
use PBG\Controller\API\Note\NoteList;
use PBG\Controller\API\Note\NotePost;
use PBG\Controller\API\Note\NoteUpdate;
use PBG\Controller\API\User\User;
use PBG\Controller\API\User\UserDelete;
use PBG\Controller\API\User\UserList;
use PBG\Controller\API\User\UserPost;
use PBG\Controller\API\User\UserUpdate;

$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$strategy = new JsonStrategy($responseFactory);

/**
 * Application router
 * 
 * @var Router $router
 */
$router->setStrategy($strategy);

$router->group(
    '/api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/api', $container->get(ApiList::class));
        $routeGroup->get('/api/{id:alphanum_dash}', $container->get(Api::class));
        $routeGroup->post('/api', $container->get(ApiPost::class));
        $routeGroup->delete('/api/{id:alphanum_dash}', $container->get(APIDelete::class));
        $routeGroup->put('/api/{id:alphanum_dash}', $container->get(APIUpdate::class));
        
        $routeGroup->map('GET', '/note', $container->get(NoteList::class));
        $routeGroup->get('/note/{id:alphanum_dash}', $container->get(Note::class));
        $routeGroup->post('/note', $container->get(NotePost::class));
        $routeGroup->delete('/note/{id:alphanum_dash}', $container->get(NoteDelete::class));
        $routeGroup->put('/note/{id:alphanum_dash}', $container->get(NoteUpdate::class));
        
        $routeGroup->map('GET', '/user', $container->get(UserList::class));
        $routeGroup->get('/user/{id:alphanum_dash}', $container->get(User::class));
        $routeGroup->post('/user', $container->get(UserPost::class));
        $routeGroup->delete('/user/{id:alphanum_dash}', $container->get(UserDelete::class));
        $routeGroup->put('/user/{id:alphanum_dash}', $container->get(UserUpdate::class));
    }
);
