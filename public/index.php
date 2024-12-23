<?php

define('APP_PATH', dirname(__DIR__));

use Symfony\Component\Dotenv\Dotenv;
use Tarifficator\Kernel\App;

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