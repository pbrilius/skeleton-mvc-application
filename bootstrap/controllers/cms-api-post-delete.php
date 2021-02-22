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

use CMS\Controller\API\Post\PostDelete;
use CMS\Model\Post;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PostDelete::class,
    function () use ($container) {
        $postDelete = new PostDelete($container->get(Post::class));

        return $postDelete;
    }
);