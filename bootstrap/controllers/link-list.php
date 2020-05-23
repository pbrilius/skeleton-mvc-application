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

use League\Container\Container;
use PBG\Controller\API\Link\LinkList;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    LinkList::class,
    function () use ($container) {
        $linkList = new LinkList($container->get('mysql.pdo')[0]);

        return $linkList;
    }
);