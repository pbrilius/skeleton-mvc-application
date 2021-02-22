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

use CMS\Controller\API\Category\CategoryList;
use CMS\Model\Category;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    CategoryList::class,
    function () use ($container) {
        $categoryList = new CategoryList($container->get(Category::class));

        return $categoryList;
    }
);