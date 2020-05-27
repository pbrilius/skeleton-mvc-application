<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ERM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ERM\Model\Quality;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Quality::class,
    function () use ($container) {
        $qualityModel = new Quality(
            $container->get('mysql.pdo')[4]
        );

        return $qualityModel;
    }
);