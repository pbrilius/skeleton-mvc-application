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

use CMS\Controller\API\Hashtag\HashtagDelete;
use CMS\Model\Hashtag;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    HashtagDelete::class,
    function () use ($container) {
        $hashtagDelete = new HashtagDelete($container->get(Hashtag::class));

        return $hashtagDelete;
    }
);