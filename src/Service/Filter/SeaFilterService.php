<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\SeaFilterDTO;

class SeaFilterService extends AbstractFilterService
{
    private string $category = 'sea';

    public function getFilter(...$libraries): SeaFilterDTO
    {
        foreach ($libraries as $library) {
            $data[$library] = $this->getItems($this->entityTypeIds[$library]);
            $fields[$library] = $this->getFieldsToFilter($this->category, $library);
        }

        if (!empty($fields) && !empty($data)) {
            $values = $this->getUniqueValues($fields, $data);
        }
        
        return new SeaFilterDTO(
            pols: $values['pol'] ?? [],
            destinations: $values['destination'] ?? [],
            terminals: $values['terminal'] ?? []
        );
    }
}