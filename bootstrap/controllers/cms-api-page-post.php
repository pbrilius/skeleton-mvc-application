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

use CMS\Controller\API\Page\PagePost;
use CMS\Model\Page;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PagePost::class,
    function () use ($container) {
        $pagePost = new PagePost($container->get(Page::class));

        return $pagePost;
    }
);