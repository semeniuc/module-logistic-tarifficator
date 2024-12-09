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
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->seaListService->getList($pol, $destination, $terminal, $containerOwner, $containerType);
    }

    public function getRailListService(
        string $terminal,
        string $destination,
        string $station,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->railListService->getList($terminal, $destination, $station, $containerOwner, $containerType);
    }

    public function getAutoListService(
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->autoListService->getList($destination, $terminal, $containerOwner, $containerType);
    }

    public function getContainerListService(
        string $destination,
        string $contractor,
        string $containerOwner,
        string $containerType,
    ): array
    {
        return $this->containerListService->getList($destination, $contractor, $containerOwner, $containerType);
    }
}

