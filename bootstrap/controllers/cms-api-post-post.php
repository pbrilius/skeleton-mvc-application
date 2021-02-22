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

use CMS\Controller\API\Post\PostPost;
use CMS\Model\Post;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PostPost::class,
    function () use ($container) {
        $postPost = new PostPost($container->get(Post::class));

        return $postPost;
    }
);