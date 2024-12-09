<?php

use Tarifficator\Controller\Api\ApiGetExchangeRateController;
use Tarifficator\Controller\Api\ApiGetListDataController;
use Tarifficator\Controller\TarifficatorController;
use Tarifficator\Kernel\Router\Route;

return [
    Route::get('/local/modules/logistic.tarifficator/', [TarifficatorController::class, 'index']),
    Route::post('/local/modules/logistic.tarifficator/' . 'api/list/get', [ApiGetListDataController::class, 'execute']),
    Route::post('/local/modules/logistic.tarifficator/' . 'api/rate/get', [ApiGetExchangeRateController::class, 'execute']),

    Route::get('/local/modules/logistic.tarifficator/test', [TarifficatorController::class, 'index']),
];