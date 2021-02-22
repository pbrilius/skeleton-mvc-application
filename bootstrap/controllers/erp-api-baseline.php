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

use ERP\Controller\API\Baseline\Baseline;
use ERP\Model\Baseline as ModelBaseline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Baseline::class,
    function () use ($container) {
        $baseline = new Baseline($container->get(ModelBaseline::class));

        return $baseline;
    }
);