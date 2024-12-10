<?php

declare(strict_types=1);

namespace Tarifficator\Controller;

use Tarifficator\Kernel\Controller\Controller;
use Tarifficator\Service\Filter\FilterService;

class TarifficatorController extends Controller
{
    public function index(): void
    {
        $filters = $this->getFilters();

        $this->view('home', [
            'title' => 'Тарификатор',
            'filters' => $filters,
        ]);
    }

    private function getFilters(): array
    {
        $filterService = new FilterService();

        return [
            'sea' => $filterService->getSea('sea', 'sea-drop', 'sea-service'),
            'railway' => $filterService->getRailway('train', 'train-service'),
            'auto' => $filterService->getAuto('auto'),
            'container' => $filterService->getContainer('container-drop', 'container-rent'),
        ];
    }
}