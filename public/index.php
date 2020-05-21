<?php

/**
 * Container load up
 * 
 * PHP version 7
 * 
 * @category Economic_Indexes
 * @package  Software_App
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository osl-3.0
 * @link     https://pbgroupeu.wordpress.com
 */

require_once __DIR__ . '/../bootstrap/container.php';
require_once __DIR__ . '/../bootstrap/middlewares.php';
require_once __DIR__ . '/../bootstrap/routes.php';

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);