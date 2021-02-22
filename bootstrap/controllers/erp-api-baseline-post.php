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

use ERP\Controller\API\Baseline\BaselinePost;
use ERP\Model\Baseline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    BaselinePost::class,
    function () use ($container) {
        $baselinePost = new BaselinePost($container->get(Baseline::class));

        return $baselinePost;
    }
);