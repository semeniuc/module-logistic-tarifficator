<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\ContainerFilterDTO;

class ContainerFilterService extends AbstractFilterService
{
    private string $category = 'container';

    public function getFilter(...$libraries): ContainerFilterDTO
    {
        foreach ($libraries as $library) {
            $data[$library] = $this->getItems($this->entityTypeIds[$library]);
            $fields[$library] = $this->getFieldsToFilter($this->category, $library);
        }

        if (!empty($fields) && !empty($data)) {
            $values = $this->getUniqueValues($fields, $data);
        }

        return new ContainerFilterDTO(destinations: $values['destination'] ?? [], contractors: $values['contractor'] ?? []);
    }
}
