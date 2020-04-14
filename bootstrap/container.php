<?php

/**
 * Contaier prioritized loading
 * 
 * PHP version 7
 * 
 * @var      array $containerPriority Container Priority
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
global $containerPriority;

$containerPriority = [
    'orm',
    'logger',
    'models',
    'controllers',
];


