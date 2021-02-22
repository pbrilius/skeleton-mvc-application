<?php

/**
 * Environment load
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Environment
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();

$dotenv->load(__DIR__.'/../.env', __DIR__.'/../.env.dev', __DIR__ . '/../.env.dev.local');
