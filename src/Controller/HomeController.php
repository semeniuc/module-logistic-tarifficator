<?php

declare(strict_types=1);

namespace App\Controller;

use App\Kernel\Controller\Controller;
use App\Service\Filter\FilterService;

class HomeController extends Controller
{
    public function index(): void
    {
//        $this->response()->send(
//            content: json_encode(['result' => 'all jobs']),
//            headers: ['Content-Type' => 'application/json'],
//        );

//        $this->view('home', [
//            'title' => 'Тарификатор',
//        ]);

        $filterService = new FilterService();

        $filterSea = $filterService->getSea();

        /*
         * todo: Filter
         * Получение уникальных значений
         * Создания DTO
         * Передача DTO в интерфейс
         *
         * todo: Select
         * Получение всех значений попадающих под фильтр
         * Передача выбранных значений в бэкенд
         *
         */


        dd([
            'filterSea' => $filterSea,
        ]);
    }
}