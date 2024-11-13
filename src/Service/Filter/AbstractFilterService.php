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

    protected function getUniqueValues(array $fields, array $items): array
    {
        $values = [];

        if (!empty($fields) && !empty($items)) {
            foreach ($items as $item) {
                foreach ($fields as $key => $fieldId) {
                    if (isset($item[$fieldId])) {
                        $values[$key][] = $item[$fieldId];
                    }
                }
            }
        }

        if (!empty($values)) {
            $values = array_map(function ($array) {
                $uniqueValues = array_unique($array);
                sort($uniqueValues);
                return $uniqueValues;
            }, $values);
        }

        return $values ?? [];
    }

    protected function getFieldsToFilter(string $type): array
    {
        $fields = (include APP_PATH . '/config/fields/' . $type . '.php');
        $result = [];

        foreach ($fields as $key => $field) {
            if ($field['view']['filter']) {
                $result[$key] = $field['id'][APP_ENV];
            }
        }

        return $result;
    }
}
