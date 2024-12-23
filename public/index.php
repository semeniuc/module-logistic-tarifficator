<?php

define('APP_PATH', dirname(__DIR__));

use Symfony\Component\Dotenv\Dotenv;
use Tarifficator\Kernel\App;

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
    require_once APP_PATH . '/include.php';

    $dotenv = new Dotenv();
    $dotenv->loadEnv(APP_PATH . '/.env');
    
    define("APP_ENV", $_SERVER['APP_ENV']);
    define("APP_URL", $_SERVER['APP_URL']);
    define("APP_VERSION", $_SERVER['APP_VERSION']);

    $app = new App();
    $app->run();
} catch (Throwable $th) {
    echo json_encode([
        'error' => $th->getMessage(),
        'file' => $th->getFile(),
        'line' => $th->getLine(),
    ], JSON_PRETTY_PRINT);
}