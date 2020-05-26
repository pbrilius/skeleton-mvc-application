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

use CMS\Controller\API\Category\Category;
use CMS\Model\Category as ModelCategory;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Category::class,
    function () use ($container) {
        $category = new Category($container->get(ModelCategory::class));

        return $category;
    }
);