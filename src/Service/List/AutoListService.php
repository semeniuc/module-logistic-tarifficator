<?php

declare(strict_types=1);

namespace App\Service\List;

use App\DTO\List\AutoListDTO;
use App\DTO\List\ListDTO;

class AutoListService extends AbstractListService
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
        $filterFields = $this->getFieldsToFilter('auto');

        $filter = [
            '=' . $filterFields['pod'] => $pod,
            '=' . $filterFields['destination'] => $destination,
        ];

        $items = $this->getItems($this->entityTypeIds['auto'], ['filter' => $filter]);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
            }
        }

        return $result ?? [];
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): AutoListDTO
    {
        $listFields = $this->getFieldsToList('auto');

        return new AutoListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: "",
            deliveryPriceValidFrom: "6/20/2024",
            comment: $item[$listFields['comment']]
        );
    }
}