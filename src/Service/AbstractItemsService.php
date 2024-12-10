<?php

declare(strict_types=1);

namespace Tarifficator\Service;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
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
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator(APP_PATH . '/config/library', FilesystemIterator::SKIP_DOTS)
            );

            foreach ($iterator as $item) {
                if ($item->isFile()) {
                    if ($item->getExtension() === 'php') {
                        $entityType = str_replace('.php', '', $item->getFilename());

                        $entityTypeId = (include $item->getPathname())['entityType'][APP_ENV];

                        if ($entityTypeId) {
                            $this->entityTypeIds[$entityType] = $entityTypeId;
                        }
                    }
                }
            }
        }
    }

    public function getItems(int $entityTypeId, array $params = []): array
    {
        return $this->entityRepository->getItems($entityTypeId, $params);
    }
}