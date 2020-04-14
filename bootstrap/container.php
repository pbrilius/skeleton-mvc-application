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

 /**
  * Vector of priori
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

foreach ($containerPriority as $initConsumption) {

}
