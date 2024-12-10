<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\ContainerListDTO;
use Tarifficator\DTO\List\ListDTO;

class ContainerListService extends AbstractListService
{
    public string $category = 'container';

    /**
     * @return ListDTO[]
     */
    public function getList(
        string $entityType,
        string $destination,
        string $contractor,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($entityType, $destination, $contractor);

        if ($filter && $containerOwner && $containerType) {
            $items = $this->getItems($this->entityTypeIds[$this->category][$entityType], ['filter' => $filter]);

            if (count($items) > 0) {
                foreach ($items as $item) {
                    $result[] = $this->prepareDTO($entityType, $item, $containerOwner, $containerType);
                }
            }
        }

        return $result ?? [];
    }

    private function prepareFilter(string $entityType, string $destination, string $contractor): ?array
    {
        $filterFields = $this->getFieldsToFilter($this->category, $entityType);

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($contractor)) {
            $filter['=' . $filterFields['contractor']] = $contractor;
        }

        return $filter ?? null;
    }

    protected function prepareDTO(string $entityType, array $item, string $containerOwner, string $containerType): ContainerListDTO
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);
        $rentalCost = $this->getRentalCost($entityType, $item, $containerOwner, $containerType);
        $validTill = $this->getDate($item[$listFields['priceValidTill']]);

        return new ContainerListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerType: $containerType,
            rentalCost: $rentalCost,
            rentalPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
            isService: $this->isService($entityType),
        );
    }

    private function getRentalCost(string $entityType, array $item, string $containerOwner, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        if ($containerType === '40hc') {
            $value = $item[$listFields['cost40Hc']];
        } else {
            $value = $item[$listFields['cost20Dry']];
        }

        return $this->getCost($value ?? '', '$');
    }

    private function isService(string $type): bool
    {
        return $type === 'container-drop';
    }
}