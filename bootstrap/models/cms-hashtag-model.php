<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  CMS
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use CMS\Model\Hashtag;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Hashtag::class,
    function () use ($container) {
        $hashtagModel = new Hashtag(
            $container->get('mysql.pdo')[2]
        );

        return $hashtagModel;
    }
);