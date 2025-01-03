<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\SeaFilterDTO;

class SeaFilterService extends AbstractFilterService
{
    public function getFilter(): SeaFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['sea']);
        $fields = $this->getFieldsToFilter('sea');
        $values = $this->getUniqueValues($fields, $data);

        return new SeaFilterDTO(
            pols: $values['pol'] ?? [],
            pods: $values['pod'] ?? [],
            destinations: $values['destination'] ?? []
        );
    }
}