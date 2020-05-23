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
use PBG\Controller\API\Hashtag\Hashtag;
use PBG\Controller\API\Hashtag\HashtagDelete;
use PBG\Controller\API\Hashtag\HashtagList;
use PBG\Controller\API\Hashtag\HashtagPost;
use PBG\Controller\API\Hashtag\HashtagUpdate;
use PBG\Controller\API\Image\Image;
use PBG\Controller\API\Image\ImageDelete;
use PBG\Controller\API\Image\ImageList;
use PBG\Controller\API\Image\ImagePost;
use PBG\Controller\API\Image\ImageUpdate;
use PBG\Controller\API\Link\Link;
use PBG\Controller\API\Link\LinkDelete;
use PBG\Controller\API\Link\LinkList;
use PBG\Controller\API\Link\LinkPost;
use PBG\Controller\API\Link\LinkUpdate;
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
use PBG\Controller\API\Video\Video;
use PBG\Controller\API\Video\VideoDelete;
use PBG\Controller\API\Video\VideoList;
use PBG\Controller\API\Video\VideoPost;
use PBG\Controller\API\Video\VideoUpdate;

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
        
        $routeGroup->map('GET', '/video', $container->get(VideoList::class));
        $routeGroup->get('/video/{id:alphanum_dash}', $container->get(Video::class));
        $routeGroup->post('/video', $container->get(VideoPost::class));
        $routeGroup->delete('/video/{id:alphanum_dash}', $container->get(VideoDelete::class));
        $routeGroup->put('/video/{id:alphanum_dash}', $container->get(VideoUpdate::class));
        
        $routeGroup->map('GET', '/image', $container->get(ImageList::class));
        $routeGroup->get('/image/{id:alphanum_dash}', $container->get(Image::class));
        $routeGroup->post('/image', $container->get(ImagePost::class));
        $routeGroup->delete('/image/{id:alphanum_dash}', $container->get(ImageDelete::class));
        $routeGroup->put('/image/{id:alphanum_dash}', $container->get(ImageUpdate::class));
        
        $routeGroup->map('GET', '/hashtag', $container->get(HashtagList::class));
        $routeGroup->get('/hashtag/{id:alphanum_dash}', $container->get(Hashtag::class));
        $routeGroup->post('/hashtag', $container->get(HashtagPost::class));
        $routeGroup->delete('/hashtag/{id:alphanum_dash}', $container->get(HashtagDelete::class));
        $routeGroup->put('/hashtag/{id:alphanum_dash}', $container->get(HashtagUpdate::class));
        
        $routeGroup->map('GET', '/link', $container->get(LinkList::class));
        $routeGroup->get('/link/{id:alphanum_dash}', $container->get(Link::class));
        $routeGroup->post('/link', $container->get(LinkPost::class));
        $routeGroup->delete('/link/{id:alphanum_dash}', $container->get(LinkDelete::class));
        $routeGroup->put('/link/{id:alphanum_dash}', $container->get(LinkUpdate::class));
    }
);
