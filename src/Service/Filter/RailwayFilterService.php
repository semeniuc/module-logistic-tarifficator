<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\RailwayFilterDTO;

class RailwayFilterService extends AbstractFilterService
{
    public function getFilter(): RailwayFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['railway']);
        $fields = $this->getFieldsToFilter('railway');
        $values = $this->getUniqueValues($fields, $data);

        return new RailwayFilterDTO(
            terminals: $values['terminal'] ?? [],
            destinations: $values['destination'] ?? [],
            stations: $values['station'] ?? [],
        );
    }
}
