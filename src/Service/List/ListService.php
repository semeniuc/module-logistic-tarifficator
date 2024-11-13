<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

class ListService
{
    private SeaListService $seaListService;
    private RailListService $railListService;
    private AutoListService $autoListService;
    private ContainerListService $containerListService;

    public function __construct()
    {
        $this->seaListService = new SeaListService();
        $this->railListService = new RailListService();
        $this->autoListService = new AutoListService();
        $this->containerListService = new ContainerListService();
    }

    public function getSeaListService(
        string $pol,
        string $pod,
        string $destination,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->seaListService->getList($pol, $pod, $destination, $containerOwner, $containerType);
    }

    public function getRailListService(
        string $pod,
        string $destination,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->railListService->getList($pod, $destination, $containerOwner, $containerType);
    }

    public function getAutoListService(
        string $station,
        string $point,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->autoListService->getList($station, $point, $containerOwner, $containerType);
    }

    public function getContainerListService(
        string $destination,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->containerListService->getList($destination, $containerOwner, $containerType);
    }
}

