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

use League\Container\Container;
use League\Route\Router;

require_once __DIR__ . '/../bootstrap/container.php';

/**
 * Container
 * 
 * @var Container $container
 */
$router = $container->get(Router::class);

/**
 * Application router sites
 */
require_once __DIR__ . '/../bootstrap/routes.php';

/**
 * Pre-routing middlewares
 */
require_once __DIR__ . '/../bootstrap/middlewares-pre.php';

require_once __DIR__ . '/../bootstrap/api.php';

/**
 * ETL Big Data consumption
 */
require_once __DIR__ . '/../bootstrap/etl.php';

/**
 * CMS sites
 */
require_once __DIR__ . '/../bootstrap/cms-api.php';

/**
 * ERP sites
 */
require_once __DIR__ . '/../bootstrap/erp-api.php';

/**
 * ERM sites
 */
require_once __DIR__ . '/../bootstrap/erm-api.php';

/**
 * CRM sites
 */
require_once __DIR__ . '/../bootstrap/crm-api.php';

/**
 * Modules engine
 */
global $modules;

foreach ($modules as $module) {
    include_once __DIR__ . '/../bootstrap/' . strtolower($module) . '-api.php';
}

/**
 * Application middlewares - post routing
 */
require_once __DIR__ . '/../bootstrap/middlewares-post.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
