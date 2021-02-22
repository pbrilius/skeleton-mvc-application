<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  CMS
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use CMS\Model\Category;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Category::class,
    function () use ($container) {
        $categoryModel = new Category(
            $container->get('mysql.pdo')[2]
        );

        return $categoryModel;
    }
);