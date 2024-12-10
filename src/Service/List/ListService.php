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
        $result = [];
        $entityTypes = $this->seaListService->entityTypeIds[$this->seaListService->category];

        if ($entityTypes) {
            foreach ($entityTypes as $entityType => $entityTypeId) {
                $list = $this->seaListService->getList($entityType, $pol, $destination, $terminal, $containerOwner, $containerType);
                $result = array_merge_recursive($result, $list);
            }
        }

        return $result;
    }

    public function getRailListService(
        string $terminal,
        string $destination,
        string $station,
        string $containerOwner,
        string $containerType,
    ): array
    {
        $result = [];
        $entityTypes = $this->railListService->entityTypeIds[$this->railListService->category];

        if ($entityTypes) {
            foreach ($entityTypes as $entityType => $entityTypeId) {
                $list = $this->railListService->getList($entityType, $terminal, $destination, $station, $containerOwner, $containerType);
                $result = array_merge_recursive($result, $list);
            }
        }

        return $result;
    }

    public function getAutoListService(
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType,
    ): array
    {
        $result = [];
        $entityTypes = $this->autoListService->entityTypeIds[$this->autoListService->category];

        if ($entityTypes) {
            foreach ($entityTypes as $entityType => $entityTypeId) {
                $list = $this->autoListService->getList($entityType, $destination, $terminal, $containerOwner, $containerType);
                $result = array_merge_recursive($result, $list);
            }
        }

        return $result;
    }

    public function getContainerListService(
        string $destination,
        string $contractor,
        string $containerOwner,
        string $containerType,
    ): array
    {
        $result = [];
        $entityTypes = $this->containerListService->entityTypeIds[$this->containerListService->category];

        if ($entityTypes) {
            foreach ($entityTypes as $entityType => $entityTypeId) {
                $list = $this->containerListService->getList($entityType, $destination, $contractor, $containerOwner, $containerType);
                $result = array_merge_recursive($result, $list);
            }
        }

        return $result;
    }
}