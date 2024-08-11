<?php

declare(strict_types=1);

namespace App\Controller;

use App\Kernel\Controller\Controller;
use App\Service\Filter\FilterService;
use App\Service\List\SeaListService;

class HomeController extends Controller
{
    public function index(): void
    {
//        $this->response()->send(
//            content: json_encode(['result' => 'all jobs']),
//            headers: ['Content-Type' => 'application/json'],
//        );



        $filterService = new FilterService();

        $filterSea = $filterService->getSea();
        $filterRailway = $filterService->getRailway();
        $filterContainer = $filterService->getContainer();

        $this->view('home', [
            'title' => 'Тарификатор',
            'filters' => [
                'sea' => $filterSea,
                'railway' => $filterRailway,
                'container' => $filterContainer,
            ],
        ]);


//        $listSea = (new SeaListService())->getList(
//            [
//                'pol' => 'Qingdao',
//                'pod' => 'Владивосток (ВМТП)',
//                'destination' => 'Иркутск',
//                'containerOwner' => 'coc',
//                'containerType' => '20dry',
//            ]
//        );

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


//        dd([
//            'filterSea' => $filterSea,
//            'filterRailway' => $filterRailway,
//            'filterContainer' => $filterContainer,
//        ]);
    }
}