<?php

declare(strict_types=1);

namespace App\Service\List;

class ListService
{
    private SeaListService $seaListService;
    public function __construct()
    {
        $this->seaListService = new SeaListService();
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

}

