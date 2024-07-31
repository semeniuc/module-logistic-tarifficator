<?php

use App\Controller\HomeController;
use App\Kernel\Router\Route;

return [
    Route::get(APP_URL, [HomeController::class, 'index']),
    Route::post(APP_URL, [HomeController::class, 'index']),
];