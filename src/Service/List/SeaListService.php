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
    ): array {
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

        $deliveryCost = $this->getDeliveryCost($item, $containerOwner, $containerType);
        $validTill = $this->getDate($item[$listFields['deliveryPriceValidTill']]);

        return new SeaListDTO(
            contractor: $item[$listFields['contractor']],
            route: $item[$listFields['route']],
            destination: $item[$listFields['destination']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: $deliveryCost,
            deliveryPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
        );
    }

    private function getDeliveryCost(array $item, string $containerOwner, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList('sea');

        if ($containerType === '40hc') {
            $value = $item[$listFields['deliveryCostSoc40Hc']];
        } else {
            if ($containerOwner === 'soc') {
                $value = $item[$listFields['deliveryCostSoc20Dry']];
            } else {
                $value = $item[$listFields['deliveryCostCoc20Dry']];
            }
        }

        return $this->getCost($value ?? '', '$');
    }
}