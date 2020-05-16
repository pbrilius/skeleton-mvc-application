<?php

/**
 * Contaier prioritized loading
 * 
 * PHP version 7
 * 
 * @category Doctrine
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Psr\Container\ContainerInterface;

/**
 * Container - PSR compatible
 * 
 * @var ContainerInterface $container
 */
$container = include __DIR__ . '/bootstrap/container.php';

return ConsoleRunner::createHelperSet($container->get('doctrine.em')[0]);
