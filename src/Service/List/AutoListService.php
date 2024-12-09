<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\AutoListDTO;
use Tarifficator\DTO\List\ListDTO;

class AutoListService extends AbstractListService
{
    /**
     * @return ListDTO[]
     */
    public function getList(
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($destination, $terminal);

        if ($filter && $containerType && $containerOwner) {
            $items = $this->getItems($this->entityTypeIds['auto'], ['filter' => $filter]);

            if (count($items) > 0) {
                foreach ($items as $item) {
                    $result[] = $this->prepareDTO($item, $containerOwner, $containerType);
                }
            }
        }

        return $result ?? [];
    }

    private function prepareFilter(string $destination, string $terminal): ?array
    {
        $filterFields = $this->getFieldsToFilter('auto');

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($terminal)) {
            $filter['=' . $filterFields['terminal']] = $terminal;
        }

        return $filter ?? null;
    }

    protected function prepareDTO(array $item, string $containerOwner, string $containerType): AutoListDTO
    {
        $listFields = $this->getFieldsToList('auto');

        $deliveryCost = $this->getDeliveryCost($item, $containerType);
        $terminalCost = $this->getTerminalCost($item, $containerType);

        $deliveryValidTill = $this->getDate($item[$listFields['deliveryPriceValidTill']]);
        $terminalValidTill = $this->getDate($item[$listFields['loadingFeeValidTill']]);

        return new AutoListDTO(
            contractor: $item[$listFields['contractor']],
            destination: $item[$listFields['destination']],
            containerOwner: $containerOwner,
            containerType: $containerType,
            deliveryCost: $deliveryCost,
            deliveryValidTill: $deliveryValidTill,
            terminalCost: $terminalCost,
            terminalValidTill: $terminalValidTill,
            comment: $item[$listFields['comment']],
            isActive: $this->isActive($deliveryValidTill),
        );
    }

    private function getDeliveryCost(array $item, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList('auto');

        if ($containerType === '40hc (<20т)') {
            $value = $item[$listFields['deliveryCost40HcLess20']];
        } else {
            $value = $item[$listFields['deliveryCost20DryLess18']];
        }

        return $this->getCost($value ?? '');
    }

    private function getTerminalCost(array $item, string $containerType): string
    {
        $listFields = $this->getFieldsToList('auto');

        if ($containerType === '40hc (<20т)') {
            $value = $item[$listFields['terminal40Hc']];
        } else {
            $value = $item[$listFields['terminal20Dry']];
        }

        return $this->getCost($value ?? '');
    }
}