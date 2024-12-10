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

    public function getSea(...$libraries): SeaFilterDTO
    {
        return $this->seaFilterService->getFilter(...$libraries);
    }

    public function getRailway(...$libraries): RailwayFilterDTO
    {
        return $this->railwayFilterService->getFilter(...$libraries);
    }

    public function getContainer(...$libraries): ContainerFilterDTO
    {
        return $this->containerFilterService->getFilter(...$libraries);
    }

    public function getAuto(...$libraries): AutoFilterDTO
    {
        return $this->autoFilterService->getFilter(...$libraries);
    }
}
