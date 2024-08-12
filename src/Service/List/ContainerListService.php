<?php

declare(strict_types=1);

namespace App\Service\List;

use App\DTO\List\ContainerListDTO;
use App\DTO\List\ListDTO;

class ContainerListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $destination,
        string $containerOwner,
        string $containerType
    ): array {
        $filterFields = $this->getFieldsToFilter('container');

        $filter = [
            '=' . $filterFields['destination'] => $destination,
        ];

        $items = $this->getItems($this->entityTypeIds['container'], ['filter' => $filter]);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
            }
        }

        return $result ?? [];
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): ContainerListDTO
    {
        $listFields = $this->getFieldsToList('container');

        return new ContainerListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerType: $containerType,
            rentalCost: "",
            rentalPriceValidFrom: "6/20/2024",
            comment: $item[$listFields['comment']]
        );
    }
}