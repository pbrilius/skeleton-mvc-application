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

use ERP\Controller\API\Upperline\UpperlinePost;
use ERP\Model\Upperline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    UpperlinePost::class,
    function () use ($container) {
        $upperlinePost = new UpperlinePost($container->get(Upperline::class));

        return $upperlinePost;
    }
);