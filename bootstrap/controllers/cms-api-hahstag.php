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

use CMS\Controller\API\Hashtag\Hashtag;
use CMS\Model\Hashtag as ModelHashtag;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    Hashtag::class,
    function () use ($container) {
        $hashtag = new Hashtag($container->get(ModelHashtag::class));

        return $hashtag;
    }
);