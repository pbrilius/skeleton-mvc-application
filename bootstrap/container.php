<?php

/**
 * Contaier prioritized loading
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

use League\Container\Container;

/**
  * Vector of priority
  * 
  * @var array $containerPriority Container Priority
  */
global $containerPriority;

$containerPriority = [
    'orm',
    'logger',
    'models',
    'controllers',
];


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/env.php';

$container = new Container();

foreach ($containerPriority as $initConsumption) {
    $prerequisites = glob(__DIR__ . '/' . $initConsumption . '/*.php');
    foreach ($prerequisites as $prerequisite) {
        include $prerequisite;
    }
}

return $container;
