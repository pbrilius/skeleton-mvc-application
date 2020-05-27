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

use ERM\Controller\Quality\QualityList;
use ERM\Model\Quality;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    QualityList::class,
    function () use ($container) {
        $qualityList = new QualityList($container->get(Quality::class));

        return $qualityList;
    }
);