<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\ContainerListDTO;
use Tarifficator\DTO\List\ListDTO;

class ContainerListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $destination,
        string $contractor,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($destination, $contractor);

        if ($filter && $containerOwner && $containerType) {
            $items = $this->getItems($this->entityTypeIds['container'], ['filter' => $filter]);

            if (count($items) > 0) {
                foreach ($items as $item) {
                    $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
                }
            }
        }

        return $result ?? [];
    }

    private function prepareFilter(string $destination, string $contractor): ?array
    {
        $filterFields = $this->getFieldsToFilter('container');

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($contractor)) {
            $filter['=' . $filterFields['contractor']] = $contractor;
        }

        return $filter ?? null;
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): ContainerListDTO
    {
        $listFields = $this->getFieldsToList('container');
        $rentalCost = $this->getRentalCost($item, $containerOwner, $containerType);
        $validTill = $this->getDate($item[$listFields['priceValidTill']]);

        return new ContainerListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerType: $containerType,
            rentalCost: $rentalCost,
            rentalPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
        );
    }

    private function getRentalCost(array $item, string $containerOwner, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList('container');

        if ($containerType === '40hc') {
            $value = $item[$listFields['cost40Hc']];
        } else {
            $value = $item[$listFields['cost20Dry']];
        }

        return $this->getCost($value ?? '', '$');
    }
}