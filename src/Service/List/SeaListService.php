<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\ListDTO;
use Tarifficator\DTO\List\SeaListDTO;

class SeaListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $pol,
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($pol, $destination, $terminal);

        if ($filter && $containerType && $containerOwner) {
            $items = $this->getItems($this->entityTypeIds['sea'], ['filter' => $filter]);

            if (count($items) > 0) {
                foreach ($items as $item) {
                    $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
                }
            }
        }

        return $result ?? [];
    }

    private function prepareFilter(string $pol, string $destination, string $terminal): ?array
    {
        $filterFields = $this->getFieldsToFilter('sea');

        if (!empty($pol)) {
            $filter['=' . $filterFields['pol']] = $pol;
        }

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($terminal)) {
            $filter['=' . $filterFields['terminal']] = $terminal;
        }

        return $filter ?? null;
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
            terminal: $item[$listFields['terminal']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: $deliveryCost,
            conversion: $this->getFloat($item[$listFields['conversion']]),
            deliveryPriceValidFrom: $validTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($validTill),
            isService: true,
        );
    }

    private function getDeliveryCost(array $item, string $containerOwner, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList('sea');

        if ($containerType === '40hc') {
            if ($containerOwner === 'soc') {
                $value = $item[$listFields['deliveryCostSoc40Hc']];
            } else {
                $value = $item[$listFields['deliveryCostCoc40Hc']];
            }
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