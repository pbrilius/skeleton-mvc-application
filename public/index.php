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

use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\Stream;
use League\Container\Container;
use League\Route\Http\Exception;
use League\Route\Router;
use Monolog\Logger;

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
 * Modules engine; embedded SBPC
 */
global $modules;
global $embedded;

foreach ($modules as $module) {
    include_once __DIR__ . '/../bootstrap/' . strtolower($module) . '-api.php';
}
foreach ($embedded as $component) {
    include_once __DIR__ . '/../bootstrap/embedded/' . strtolower($component) . '-front.php';
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


try {
    $response = $router->dispatch($request);
} catch (Exception $e) {
    $data = [
        'status_code' => $e->getCode(),
        'message' => $e->getMessage()
    ];
    $response = new JsonResponse(
        $data,
        500
    );
    
    /**
     * Logger
     * 
     * @var Logger $logger Logger
     */
    $logger = $container->get('logger')[0];
    $logger->emergency(
        'Directory Index exception',
        [
            'error-data' => $data,
            'headers' => $request->getHeaders(),
        ]
    );
}

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
