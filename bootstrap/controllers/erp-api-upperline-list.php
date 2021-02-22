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

use ERP\Controller\API\Upperline\UpperlineList;
use ERP\Model\Upperline;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    UpperlineList::class,
    function () use ($container) {
        $upperlineList = new UpperlineList($container->get(Upperline::class));

        return $upperlineList;
    }
);