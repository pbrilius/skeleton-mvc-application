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

use ETL\Controller\MediaVoiceController;
use ETL\Model\VoiceModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    MediaVoiceController::class,
    function () use ($container) {
        $mediaVoiceCOntroller = new MediaVoiceController($container->get(VoiceModel::class));

        return $mediaVoiceCOntroller;
    }
);