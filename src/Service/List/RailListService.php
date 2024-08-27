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
        $deliveryCost = $this->getDeliveryCost($item, $containerOwner, $containerType);
        $securityCost = $this->getSecurityCost($item, $containerType);
        $validTill = $this->getDate($item[$listFields['deliveryPriceValidTill']]);

        return new RailListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: $deliveryCost,
            securityCost: $securityCost,
            deliveryPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
        );
    }

    private function getDeliveryCost(array $item, string $containerOwner, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList('railway');

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

        return $this->getCost($value ?? '');
    }

    private function getSecurityCost(array $item, string $containerType): string
    {
        $listFields = $this->getFieldsToList('railway');

        if ($containerType === '40hc') {
            $value = $item[$listFields['securityCost40Hc']];
        } else {
            $value = $item[$listFields['securityCost20Dry']];
        }

        return $this->getCost($value ?? '');
    }
}