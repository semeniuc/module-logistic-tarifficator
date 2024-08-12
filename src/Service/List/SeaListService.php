<?php

declare(strict_types=1);

namespace App\Service\List;

use App\DTO\List\ListDTO;
use App\DTO\List\SeaListDTO;

class SeaListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $pol,
        string $pod,
        string $destination,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filterFields = $this->getFieldsToFilter('sea');

        $filter = [
            '=' . $filterFields['pol'] => $pol,
            '=' . $filterFields['pod'] => $pod,
            '=' . $filterFields['destination'] => $destination,
        ];

        $items = $this->getItems($this->entityTypeIds['sea'], ['filter' => $filter]);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
            }
        }

        return $result ?? [];
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): SeaListDTO
    {
        $listFields = $this->getFieldsToList('sea');

        return new SeaListDTO(
            contractor: $item[$listFields['contractor']],
            route: $item[$listFields['route']],
            destination: $item[$listFields['destination']],
            containerOwner:  $containerOwner,
            containerType:  $containerType,
            deliveryCost: "",
            deliveryPriceValidFrom: "6/20/2024",
            comment: $item[$listFields['comment']]
        );
    }
}