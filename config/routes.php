<?php

use App\Controller\Api\Filter\ApiGetFilterDataController;
use App\Controller\HomeController;
use App\Controller\PlacementLeadController;
use App\Kernel\Router\Route;

return [
    Route::post(APP_URL, [HomeController::class, 'index']),
    Route::post(APP_URL . 'api/filter/getList', [ApiGetFilterDataController::class, 'execute']),
    Route::post(APP_URL . 'placement/lead', [PlacementLeadController::class, 'execute']),

    # Test
    Route::get(APP_URL, [HomeController::class, 'index']),
    Route::get(APP_URL . 'api/filter/getList', [ApiGetFilterDataController::class, 'execute']),
    Route::get(APP_URL . 'placement/lead', [PlacementLeadController::class, 'execute']),
];