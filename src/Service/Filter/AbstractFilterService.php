<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\FilterDTO;
use Tarifficator\Service\AbstractItemsService;

abstract class AbstractFilterService extends AbstractItemsService
{
    public function __construct()
    {
        parent::__construct();
    }

    abstract public function getFilter(): FilterDTO;

    protected function getUniqueValues(array $entityFields, array $entityItems): array
    {
        $values = [];

        foreach ($entityItems as $entityType => $items) {
            if (!empty($entityFields[$entityType]) && !empty($items)) {
                foreach ($items as $item) {
                    foreach ($entityFields[$entityType] as $key => $fieldId) {
                        if (isset($item[$fieldId])) {
                            $values[$key][] = $item[$fieldId];
                        }
                    }
                }
            }
        }

        if (!empty($values)) {
            $values = array_map(function ($array) {
                $uniqueValues = array_unique($array);
                sort($uniqueValues);
                return array_filter($uniqueValues);
            }, $values);
        }

        return $values ?? [];
    }

    protected function getFieldsToFilter(string $category, string $type): array
    {
        $result = [];

        $pathToFile = APP_PATH . "/config/library/{$category}/{$type}.php";
        if (file_exists($pathToFile)) {
            $fields = (include $pathToFile)['fields'];

            if (!empty($fields)) {
                foreach ($fields as $key => $field) {
                    if ($field['view']['filter']) {
                        $result[$key] = $field['id'][APP_ENV];
                    }
                }
            }
        }

        return $result;
    }
}
