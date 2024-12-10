<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\AutoFilterDTO;

class AutoFilterService extends AbstractFilterService
{
    private string $category = 'auto';

    public function getFilter(...$libraries): AutoFilterDTO
    {
        foreach ($libraries as $library) {
            $data[$library] = $this->getItems($this->entityTypeIds[$library]);
            $fields[$library] = $this->getFieldsToFilter($this->category, $library);
        }

        if (!empty($fields) && !empty($data)) {
            $values = $this->getUniqueValues($fields, $data);
        }

        return new AutoFilterDTO(
            terminals: $values['terminal'] ?? [],
            destinations: $values['destination'] ?? []
        );
    }
}
