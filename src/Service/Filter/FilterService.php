<?php

declare(strict_types=1);

namespace App\Service\Filter;

use App\DTO\FilterSeaDTO;
use App\Service\ItemsService;

class FilterService extends ItemsService
{
    private FilterSeaDTO $filterSeaDTO;

    public function __construct()
    {
        parent::__construct();
    }

    public function getSea(): FilterSeaDTO
    {
        $data = $this->entityRepository->getItems($this->entityTypeIds['sea']);
        $fields = $this->getFieldsToFilter('sea');
        $values = $this->getUniqueValues($fields, $data);

        return new FilterSeaDTO(
            pols: $values['pol'] ?? [],
            pods: $values['pod'] ?? [],
            destinations: $values['destination'] ?? [],
        );
    }

    public function getUniqueValues(array $fields, array $items): array
    {
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

    private function getFieldsToFilter(string $type): array
    {
        $fields = (include APP_PATH . '/config/fields/' . $type . '.php');

        foreach ($fields as $key => $field) {
            if ($field['view']['filter']) {
                $result[$key] = $field['id'][APP_ENV];
            }
        }

        return $result ?? [];
    }

}