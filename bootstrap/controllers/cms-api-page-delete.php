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

use CMS\Controller\API\Page\PageDelete;
use CMS\Model\Page;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    PageDelete::class,
    function () use ($container) {
        $pageDelete = new PageDelete($container->get(Page::class));

        return $pageDelete;
    }
);