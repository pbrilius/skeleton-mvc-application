#!/usr/bin/env php
<?php

/**
 * App CLI - console
 * 
 * PHP version 7
 * 
 * @category Economic_Indexes
 * @package  Software_App
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository osl-3.0
 * @link     https://pbgroupeu.wordpress.com
 */

use App\Command\BaseCommand;

require_once __DIR__ . '/bootstrap/container.php';

if (!isset($argv[1])) {
    echo 'Issue this statement with --help option' . "\n";
    exit;
}

switch ($argv[1]) {
case '--help':
    echo 'Issue this statement with added up --list option' . "\n";
    break;
case '--list':
    /**
     * Commnds array
     * 
     * @var BaseCommand $command
     */
    foreach ($container->get('app.command') as $command) {
        echo $command->getLabel() . "\n";
    }
    break;
default:
    $container->get($argv[1])[0]->execute();
}