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

use CMS\Controller\API\Post\PostUpdate;
use CMS\Model\Post;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PostUpdate::class,
    function () use ($container) {
        $postUpdate = new PostUpdate($container->get(Post::class));

        return $postUpdate;
    }
);