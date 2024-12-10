<?php

declare(strict_types=1);

namespace Tarifficator\Service\Filter;

use Tarifficator\DTO\Filter\AutoFilterDTO;

class AutoFilterService extends AbstractFilterService
{
    public function getFilter(): AutoFilterDTO
    {
        $data = $this->getItems($this->entityTypeIds['auto']);
        $fields = $this->getFieldsToFilter('auto', 'auto');
        $values = $this->getUniqueValues($fields, $data);

        return new AutoFilterDTO(
            terminals: $values['terminal'] ?? [],
            destinations: $values['destination'] ?? []
        );
    }
}
