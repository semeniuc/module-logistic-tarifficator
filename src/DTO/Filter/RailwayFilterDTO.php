<?php

declare(strict_types=1);

namespace Tarifficator\DTO\Filter;

class RailwayFilterDTO implements FilterDTO
{
    private array $containerOwners = [
        'coc',
        'soc',
    ];

    private array $containerTypes = [
        '20dry (<24т)',
        '20dry (>24т)',
        '40hc',
    ];

    public function __construct(
        private readonly array $terminals,
        private readonly array $destinations,
        private readonly array $stations,
    )
    {
    }

    public function getTerminals(): array
    {
        return $this->terminals;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }

    public function getStations(): array
    {
        return $this->stations;
    }

    public function getContainerOwners(): array
    {
        return $this->containerOwners;
    }

    public function getContainerTypes(): array
    {
        return $this->containerTypes;
    }
}