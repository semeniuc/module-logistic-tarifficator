<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\AutoFilterDTO;
use Tarifficator\DTO\Filter\ContainerFilterDTO;
use Tarifficator\DTO\Filter\RailwayFilterDTO;
use Tarifficator\DTO\Filter\SeaFilterDTO;

class FilterService
{
    private SeaFilterService $seaFilterService;
    private RailwayFilterService $railwayFilterService;
    private ContainerFilterService $containerFilterService;
    private AutoFilterService $autoFilterService;

    public function __construct()
    {
        $this->seaFilterService = new SeaFilterService();
        $this->railwayFilterService = new RailwayFilterService();
        $this->containerFilterService = new ContainerFilterService();
        $this->autoFilterService = new AutoFilterService();
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

    public function getAuto(): AutoFilterDTO
    {
        return $this->autoFilterService->getFilter();
    }
}
