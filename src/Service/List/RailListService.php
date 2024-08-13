<?php

declare(strict_types=1);

namespace App\Service\List;

use App\DTO\List\ListDTO;
use App\DTO\List\RailListDTO;

class RailListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $pod,
        string $destination,
        string $containerOwner,
        string $containerType
    ): array {
        $filterFields = $this->getFieldsToFilter('railway');

        $filter = [
            '=' . $filterFields['pod'] => $pod,
            '=' . $filterFields['destination'] => $destination,
        ];

        $items = $this->getItems($this->entityTypeIds['railway'], ['filter' => $filter]);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
            }
        }

        return $result ?? [];
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): RailListDTO
    {
        $listFields = $this->getFieldsToList('railway');

        return new RailListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: "",
            securityCost: "",
            deliveryPriceValidFrom: $this->getDate($item[$listFields['deliveryPriceValidTill']]),
            comment: $item[$listFields['comment']]
        );
    }
}