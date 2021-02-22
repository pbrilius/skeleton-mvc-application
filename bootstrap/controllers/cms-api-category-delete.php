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

use CMS\Controller\API\Category\CategoryDelete;
use CMS\Model\Category;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    CategoryDelete::class,
    function () use ($container) {
        $categoryDelete = new CategoryDelete($container->get(Category::class));

        return $categoryDelete;
    }
);