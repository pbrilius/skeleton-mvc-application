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

use ERM\Controller\API\Quality\QualityUpdate;
use ERM\Model\Quality;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    QualityUpdate::class,
    function () use ($container) {
        $qualityUpdate = new QualityUpdate($container->get(Quality::class));

        return $qualityUpdate;
    }
);