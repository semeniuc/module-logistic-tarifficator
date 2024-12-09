<?php

declare(strict_types=1);

namespace Tarifficator\DTO\Filter;

class ContainerFilterDTO implements FilterDTO
{
    private array $containerOwners = [
        'coc',
        'soc',
    ];

    private array $containerTypes = [
        '20dry',
        '40hc',
    ];

    public function __construct(
        private readonly array $destinations,
        private readonly array $contractors,
    )
    {
    }

    public function getContainerOwners(): array
    {
        return $this->containerOwners;
    }

    public function getContainerTypes(): array
    {
        return $this->containerTypes;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }

    public function getContractors(): array
    {
        return $this->contractors;
    }
}