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

use Admin\Controller\Dashboard;
use CRUD\View\Engine;
use League\Container\Container;
use PBG\Model\Api;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Dashboard::class,
    function () use ($container) {
        /**
         * Engine
         * 
         * @var Engine $engine
         */
        $engine = $container->get(Engine::class);
        $engine->setTemplatesPath($container->get('admin.config')['templates.path']);
        $dasboard = new Dashboard(
            $container->get(Api::class),
            $engine
        );

        return $dasboard;
    }
);
