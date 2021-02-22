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

use CMS\Controller\API\Category\Category;
use CMS\Controller\API\Category\CategoryDelete;
use CMS\Controller\API\Category\CategoryList;
use CMS\Controller\API\Category\CategoryPost;
use CMS\Controller\API\Category\CategoryUpdate;
use CMS\Controller\API\Hashtag\HashtagDelete;
use CMS\Controller\API\Hashtag\HashtagList;
use CMS\Controller\API\Hashtag\HashtagPost;
use CMS\Controller\API\Hashtag\HashtagUpdate;
use CMS\Controller\API\Page\Page;
use CMS\Controller\API\Page\PageDelete;
use CMS\Controller\API\Page\PageList;
use CMS\Controller\API\Page\PagePost;
use CMS\Controller\API\Page\PageUpdate;
use CMS\Controller\API\Post\Post;
use CMS\Controller\API\Post\PostDelete;
use CMS\Controller\API\Post\PostList;
use CMS\Controller\API\Post\PostPost;
use CMS\Controller\API\Post\PostUpdate;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Strategy\JsonStrategy;
use PBG\Controller\API\Hashtag\Hashtag;

$strategy = new JsonStrategy(new ResponseFactory());

/**
 * Router
 * 
 * @var Router $router Router
 */
$router->setStrategy($strategy);

$router->group(
    '/cms-api',
    function (RouteGroup $routeGroup) use ($container) {
        $routeGroup->map('GET', '/hashtag', $container->get(HashtagList::class));
        $routeGroup->get('/hashtag/{id:alphanum_dash}', $container->get(Hashtag::class));
        $routeGroup->post('/hashtag', $container->get(HashtagPost::class));
        $routeGroup->delete('/hashtag/{id:alphanum_dash}', $container->get(HashtagDelete::class));
        $routeGroup->put('/hashtag/{id:alphanum_dash}', $container->get(HashtagUpdate::class));
        
        $routeGroup->map('GET', '/category', $container->get(CategoryList::class));
        $routeGroup->get('/category/{id:alphanum_dash}', $container->get(Category::class));
        $routeGroup->post('/category', $container->get(CategoryPost::class));
        $routeGroup->delete('/category/{id:alphanum_dash}', $container->get(CategoryDelete::class));
        $routeGroup->put('/category/{id:alphanum_dash}', $container->get(CategoryUpdate::class));
        
        $routeGroup->map('GET', '/page', $container->get(PageList::class));
        $routeGroup->get('/page/{id:alphanum_dash}', $container->get(Page::class));
        $routeGroup->post('/page', $container->get(PagePost::class));
        $routeGroup->delete('/page/{id:alphanum_dash}', $container->get(PageDelete::class));
        $routeGroup->put('/page/{id:alphanum_dash}', $container->get(PageUpdate::class));
        
        $routeGroup->map('GET', '/post', $container->get(PostList::class));
        $routeGroup->get('/post/{id:alphanum_dash}', $container->get(Post::class));
        $routeGroup->post('/post', $container->get(PostPost::class));
        $routeGroup->delete('/post/{id:alphanum_dash}', $container->get(PostDelete::class));
        $routeGroup->put('/post/{id:alphanum_dash}', $container->get(PostUpdate::class));
    }
)->setName('cms-api');