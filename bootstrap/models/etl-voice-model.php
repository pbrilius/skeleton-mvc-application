<?php

/**
 * PHP version 7
 * 
 * @category Load
 * @package  ETL
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

use ETL\Model\VoiceModel;
use League\Container\Container;

/**
 * Container
 * 
 * @var Container $container
 */
$container->add(
    VoiceModel::class,
    function () use ($container) {
        $voiceModel = new VoiceModel(
            $container->get('mysql.pdo')[0],
            $container->get('mysql.pdo')[1],
            'voice_memo',
            'voice_etl'
        );

        return $voiceModel;
    }
);