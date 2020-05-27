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

use ERM\Controller\Quality\Quality;
use ERM\Model\Quality as ModelQuality;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Quality::class,
    function () use ($container) {
        $quality = new Quality($container->get(ModelQuality::class));

        return $quality;
    }
);