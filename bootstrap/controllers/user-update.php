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
use PBG\Controller\API\User\UserUpdate;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    UserUpdate::class,
    function () use ($container) {
        $userUpdate = new UserUpdate($container->get('mysql.pdo')[0]);

        return $userUpdate;
    }
);