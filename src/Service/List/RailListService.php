<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\ListDTO;
use Tarifficator\DTO\List\RailListDTO;

class RailListService extends AbstractListService
{
    public string $category = 'railway';

    /**
     * @return ListDTO[]
     */
    public function getList(
        string $entityType,
        string $terminal,
        string $destination,
        string $station,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($entityType, $terminal, $destination, $station);

        if ($filter && $containerType && $containerOwner) {
            $items = $this->getItems($this->entityTypeIds[$this->category][$entityType], ['filter' => $filter]);

            if (count($items) > 0) {
                foreach ($items as $item) {
                    $result[] = $this->prepareDTO($entityType, $item, $containerOwner, $containerType);
                }
            }
        }

        return $result ?? [];
    }

    private function prepareFilter(string $entityType, string $terminal, string $destination, string $station): ?array
    {
        $filterFields = $this->getFieldsToFilter($this->category, $entityType);

        if (!empty($terminal)) {
            $filter['=' . $filterFields['terminal']] = $terminal;
        }

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($station)) {
            $filter['=' . $filterFields['station']] = $station;
        }

        return $filter ?? null;
    }

    protected function prepareDTO(string $entityType, array $item, string $containerOwner, string $containerType): RailListDTO
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);
        $deliveryCost = $this->getDeliveryCost($entityType, $item, $containerOwner, $containerType);
        $securityCost = $this->getSecurityCost($entityType, $item, $containerType);
        $validTill = $this->getDate($item[$listFields['deliveryPriceValidTill']]);

        return new RailListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            station: $item[$listFields['station']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: $deliveryCost,
            securityCost: $securityCost,
            deliveryPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
            isService: $this->isService($entityType),
            isHidden: $this->isHidden($deliveryCost),
        );
    }

    private function getDeliveryCost(string $entityType, array $item, string $containerOwner, string $containerType): string
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        if ($containerType === '40hc') {
            if ($containerOwner === 'soc') {
                $value = $item[$listFields['deliveryCostSoc40Hc']];
            } else {
                $value = $item[$listFields['deliveryCostCoc40Hc']];
            }
        } elseif ($containerType === '20dry (<24т)') {
            if ($containerOwner === 'soc') {
                $value = $item[$listFields['deliveryCostSoc20DryLess24']];
            } else {
                $value = $item[$listFields['deliveryCostCoc20DryLess24']];
            }
        } elseif ($containerType === '20dry (>24т)') {
            if ($containerOwner === 'soc') {
                $value = $item[$listFields['deliveryCostSoc20DryMore24']];
            } else {
                $value = $item[$listFields['deliveryCostCoc20DryMore24']];
            }
        }

        if ($value === null || $value === '' || !is_numeric(str_replace(',', '', $value))) {
            return $value ?? '';
        }

        return $this->getCost($value);
    }

    private function getSecurityCost(string $entityType, array $item, string $containerType): string
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        if ($containerType === '40hc') {
            $value = $item[$listFields['securityCost40Hc']];
        } else {
            $value = $item[$listFields['securityCost20Dry']];
        }

        if ($value === null || $value === '' || !is_numeric(str_replace(',', '', $value))) {
            return $value ?? '';
        }

        return $this->getCost($value);
    }

    private function isService(string $type): bool
    {
        return $type === 'railway-service';
    }
}