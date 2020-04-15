<?php

/**
 * Essential configuration file
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Container
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

$definitions = [
    'app.root' => __DIR__ . '/..',
];

array_push(
    $definitions,
    [
        'app.logs' => $definitions['app.root'] . '/logs',
        'app.cache' => $definitions['app.root'] . '/cache',
        'app.templates' => $definitions['app.root'] . '/templates',
    ]
);

