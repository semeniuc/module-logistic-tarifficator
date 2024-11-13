<?php

declare(strict_types=1);

namespace Tarifficator\Service;

use Tarifficator\Repository\EntityRepository;

abstract class AbstractItemsService
{
    public array $entityTypeIds = [];
    protected EntityRepository $entityRepository;

    public function __construct()
    {
        $this->entityRepository = new EntityRepository();
        $this->getEntityTypeIds();
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

    public function getItems(int $entityTypeId, array $params = []): array
    {
        return $this->entityRepository->getItems($entityTypeId, $params);
    }
}