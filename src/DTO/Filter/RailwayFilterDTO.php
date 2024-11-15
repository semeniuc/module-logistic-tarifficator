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
        private readonly array $departureStations,
        private readonly array $destinationPoints,
        private readonly array $destinationStations,
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

    public function getDepartureStations(): array
    {
        return $this->departureStations;
    }

    public function getDestinationPoints(): array
    {
        return $this->destinationPoints;
    }

    public function getDestinationStations(): array
    {
        return $this->destinationStations;
    }
}