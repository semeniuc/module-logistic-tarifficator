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
            departureStations: $values['departureStation'] ?? [],
            destinationPoints: $values['destinationPoint'] ?? [],
            destinationStations: $values['destinationStation'] ?? [],
        );
    }
}
