<?php

declare(strict_types=1);

namespace App\Service\Filter;

use App\DTO\Filter\ContainerFilterDTO;

class ContainerFilterService extends AbstractFilterService
{
    public function getFilter(): ContainerFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['container']);
        $fields = $this->getFieldsToFilter('container');
        $values = $this->getUniqueValues($fields, $data);

        return new ContainerFilterDTO(destinations: $values['destination'] ?? []);
    }
}
