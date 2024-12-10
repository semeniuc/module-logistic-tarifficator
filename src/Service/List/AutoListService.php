<?php

declare(strict_types=1);

namespace Tarifficator\Service\List;

use Tarifficator\DTO\List\AutoListDTO;
use Tarifficator\DTO\List\ListDTO;

class AutoListService extends AbstractListService
{
    public string $category = 'auto';

    /**
     * @return ListDTO[]
     */
    public function getList(
        string $entityType,
        string $destination,
        string $terminal,
        string $containerOwner,
        string $containerType
    ): array
    {
        $filter = $this->prepareFilter($entityType, $destination, $terminal);

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

    private function prepareFilter(string $entityType, string $destination, string $terminal): ?array
    {
        $filterFields = $this->getFieldsToFilter($this->category, $entityType);

        if (!empty($destination)) {
            $filter['=' . $filterFields['destination']] = $destination;
        }

        if (!empty($terminal)) {
            $filter['=' . $filterFields['terminal']] = $terminal;
        }

        return $filter ?? null;
    }

    protected function prepareDTO(string $entityType, array $item, string $containerOwner, string $containerType): AutoListDTO
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        $deliveryCost = $this->getDeliveryCost($entityType, $item, $containerType);
        $terminalCost = $this->getTerminalCost($entityType, $item, $containerType);

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

    private function getDeliveryCost(string $entityType, array $item, string $containerType): ?string
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        if ($containerType === '40hc (<20т)') {
            $value = $item[$listFields['deliveryCost40HcLess20']];
        } else {
            $value = $item[$listFields['deliveryCost20DryLess18']];
        }

        return $this->getCost($value ?? '');
    }

    private function getTerminalCost(string $entityType, array $item, string $containerType): string
    {
        $listFields = $this->getFieldsToList($this->category, $entityType);

        if ($containerType === '40hc (<20т)') {
            $value = $item[$listFields['terminal40Hc']];
        } else {
            $value = $item[$listFields['terminal20Dry']];
        }

        return $this->getCost($value ?? '');
    }
}