<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\EntityRepository;

abstract class ItemsService
{
    protected EntityRepository $entityRepository;
    protected array $entityTypeIds = [];

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
}