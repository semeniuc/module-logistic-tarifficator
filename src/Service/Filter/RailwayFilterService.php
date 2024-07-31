<?php

declare(strict_types=1);

namespace App\Service\Filter;

use App\DTO\Filter\RailwayFilterDTO;

class RailwayFilterService extends AbstractFilterService
{
    public function getFilter(): RailwayFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['railway']);
        $fields = $this->getFieldsToFilter('railway');
        $values = $this->getUniqueValues($fields, $data);

        return new RailwayFilterDTO(
            pods: $values['pod'] ?? [],
            destinations: $values['destination'] ?? []
        );
    }
}
