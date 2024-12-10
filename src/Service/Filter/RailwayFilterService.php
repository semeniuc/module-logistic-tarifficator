<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\RailwayFilterDTO;

class RailwayFilterService extends AbstractFilterService
{
    private string $category = 'railway';

    public function getFilter(...$libraries): RailwayFilterDTO
    {
        foreach ($libraries as $library) {
            $data[$library] = $this->getItems($this->entityTypeIds[$library]);
            $fields[$library] = $this->getFieldsToFilter($this->category, $library);
        }

        if (!empty($fields) && !empty($data)) {
            $values = $this->getUniqueValues($fields, $data);
        }
        
        return new RailwayFilterDTO(
            terminals: $values['terminal'] ?? [],
            destinations: $values['destination'] ?? [],
            stations: $values['station'] ?? [],
        );
    }
}
