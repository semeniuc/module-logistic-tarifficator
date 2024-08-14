<?php

use App\Controller\Api\ExchangeRate\ApiGetExchangeRateController;
use App\Controller\Api\Filter\ApiGetFilterDataController;
use App\Controller\Api\Filter\ApiGetListDataController;
use App\Controller\HomeController;
use App\Kernel\Router\Route;

return [
    Route::post(APP_URL, [HomeController::class, 'index']),
    Route::post(APP_URL . 'api/list/get', [ApiGetListDataController::class, 'execute']),
    Route::post(APP_URL . 'api/list/select', [ApiGetListDataController::class, 'execute']),

    # Test
    Route::get(APP_URL, [HomeController::class, 'index']),
    Route::get(APP_URL . 'api/list/get', [ApiGetListDataController::class, 'execute']),
    Route::get(APP_URL . 'api/list/select', [ApiGetFilterDataController::class, 'execute']),
    Route::get(APP_URL . 'api/rate/get', [ApiGetExchangeRateController::class, 'execute']),
];