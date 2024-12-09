<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\ContainerFilterDTO;

class ContainerFilterService extends AbstractFilterService
{
    public function getFilter(): ContainerFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['container']);
        $fields = $this->getFieldsToFilter('container');
        $values = $this->getUniqueValues($fields, $data);
        
        return new ContainerFilterDTO(destinations: $values['destination'] ?? [], contractors: $values['contractor'] ?? []);
    }
}
