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
    'pdo',
    'logger',
    'models',
];

if (PHP_SAPI === 'cli') {
    $containerPriority[] = 'commands';
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/env.php';

$container = new Container();

require __DIR__ . '/config.php';

if ($_ENV['APPLICATION_MODE'] === 'development') {
    include __DIR__ . '/config-tdd.php';
}

/**
 * OOP vector; procedural shift; H1;
 */
global $modules;
global $embedded;

$modules = [];
$embedded = [];

foreach ($_ENV as $potentialModule => $switch) {
    if (!strstr($potentialModule, strtoupper('module'))) {
        continue;
    }
    $moduleExploder = explode('_', $potentialModule);
    if ((bool) $switch) {
        $containerPriority[] = strtolower($moduleExploder[1]);
        $modules []= $moduleExploder[1];
    }

}
foreach ($_ENV as $potentialComponent => $switch) {
    if (!strstr($potentialComponent, strtoupper('component'))) {
        continue;
    }
    $componentExploder = explode('_', $potentialComponent);
    if ((bool) $switch) {
        $containerPriority[] = strtolower('embedded/' . $componentExploder[1]);
        $embedded []= $componentExploder[1];
    }

}

foreach ($containerPriority as $initConsumption) {
    $prerequisites = glob(__DIR__ . '/' . $initConsumption . '/*.php');
    foreach ($prerequisites as $prerequisite) {
        include $prerequisite;
    }
}

$postLoad = [
    'controllers',
    'router',
];

foreach ($postLoad as $postLoader) {
    $postRequisites = glob(__DIR__ . '/' . $postLoader . '/*.php');
    foreach ($postRequisites as $postRequisite) {
        include $postRequisite;
    }
}

return $container;
