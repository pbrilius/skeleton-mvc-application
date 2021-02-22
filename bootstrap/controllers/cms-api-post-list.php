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

use CMS\Controller\API\Post\PostList;
use CMS\Model\Post;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PostList::class,
    function () use ($container) {
        $postList = new PostList($container->get(Post::class));

        return $postList;
    }
);