<?php

declare(strict_types=1);

namespace App\Service\Filter;

use App\Repository\EntityRepository;
use App\Service\ItemsService;

class GetUniqueValuesService extends ItemsService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUniqueValues(): array
    {

        return [];
    }

    private function getItemsData(): array
    {
        foreach ($this->entityTypeIds as $entityType => $entityTypeId) {
            $result[$entityType] = $this->entityRepository->getItems($entityTypeId);
        }

        return $result ?? [];
    }

}