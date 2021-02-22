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

use ERP\Controller\API\Baseline\BaselineList;
use ERP\Model\Baseline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    BaselineList::class,
    function () use ($container) {
        $baselineList = new BaselineList($container->get(Baseline::class));

        return $baselineList;
    }
);