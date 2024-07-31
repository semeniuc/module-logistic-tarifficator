<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\EntityRepository;

abstract class AbstractItemsService
{
    protected EntityRepository $entityRepository;
    public array $entityTypeIds = [];

    public function __construct()
    {
        $this->entityRepository = new EntityRepository();
        $this->getEntityTypeIds();
    }

    public function getItems(int $entityTypeId): array
    {
        return $this->entityRepository->getItems($entityTypeId);
    }

    private function getEntityTypeIds(): void
    {
        if (empty($this->entityTypeIds)) {
            if ($list = (include APP_PATH . '/config/app/categories.php')) {
                foreach ($list as $entityType => $libraries) {
                    $types[$entityType] = $libraries[mb_convert_case(APP_ENV, MB_CASE_LOWER)];
                }
                $this->entityTypeIds = $types ?? [];
            }
        }
    }
}