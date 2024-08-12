<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Filter\FilterDTO;
use App\Kernel\Controller\Controller;
use App\Service\Filter\FilterService;
use App\Service\List\ListService;

class HomeController extends Controller
{
    public function index(): void
    {
        $filters = $this->getFilters();

        foreach ($filters as $filterId => $filter) {
            $filterId = str_replace('_form', '', $filterId);
            $lists[$filterId] = $this->getListData($filterId, $filter);
        }

        $this->view('home', [
            'title' => 'Тарификатор',
            'filters' => $filters,
            'lists' => $lists ?? [],
        ]);



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

    private function getFilters(): array
    {
        $filterService = new FilterService();

        return [
            'sea' => $filterService->getSea(),
            'railway' => $filterService->getRailway(),
            'container' => $filterService->getContainer(),
        ];
    }

    private function getListData(string $entityName, FilterDTO $filter): array
    {
        $listService = new ListService();

        return match ($entityName) {
            'sea' => $listService->getSeaListService(
                $filter->getPols()[0] ?? "",
                $filter->getPods()[0] ?? "",
                $filter->getPods()[0] ?? "",
                $filter->getContainerOwners()[0] ?? "",
                $filter->getContainerTypes()[0] ?? "",
            ),
            default => [],
        };
    }
}