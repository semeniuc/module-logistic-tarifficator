<?php

define('APP_PATH', dirname(__DIR__));

use Symfony\Component\Dotenv\Dotenv;
use Tarifficator\Kernel\App;
use Tarifficator\Kernel\Http\Response;

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
    require_once APP_PATH . '/include.php';

    $dotenv = new Dotenv();
    $dotenv->loadEnv(APP_PATH . '/.env');

    # TEST
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");

    define("APP_ENV", $_SERVER['APP_ENV']);
    define("APP_URL", $_SERVER['APP_URL']);
    
    $app = new App();
    $app->run();
} catch (Throwable $th) {
//    LoggingService::save([
//        'code' => $th->getCode(),
//        'message' => $th->getMessage(),
//        'file' => $th->getFile(),
//        'line' => $th->getLine(),
//    ], 'error', 'errors');

//    echo json_encode(['result' => 'error']);

    $response = new Response();
    $response->send(
        content: json_encode([
            'file' => $th->getFile(),
            'line' => $th->getLine(),
            'error' => $th->getMessage(),
        ]),
        status: $th->getCode(),
        headers: ['Content-Type' => 'application/json'],
    );
}