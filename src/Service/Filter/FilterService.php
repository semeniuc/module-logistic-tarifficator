<?php

declare(strict_types=1);

namespace App\Service\Filter;

use App\DTO\Filter\ContainerFilterDTO;
use App\DTO\Filter\RailwayFilterDTO;
use App\DTO\Filter\SeaFilterDTO;

class FilterService
{
    private SeaFilterService $seaFilterService;
    private RailwayFilterService $railwayFilterService;
    private ContainerFilterService $containerFilterService;

    public function __construct() {
        $this->seaFilterService = new SeaFilterService();
        $this->railwayFilterService = new RailwayFilterService();
        $this->containerFilterService = new ContainerFilterService();
    }

    public function getSea(): SeaFilterDTO
    {
        return $this->seaFilterService->getFilter();
    }

    public function getRailway(): RailwayFilterDTO
    {
        return $this->railwayFilterService->getFilter();
    }

    public function getContainer(): ContainerFilterDTO
    {
        return $this->containerFilterService->getFilter();
    }
}
