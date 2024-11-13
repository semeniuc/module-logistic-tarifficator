<?php

declare(strict_types=1);

namespace Tarifficator\DTO\Filter;

class AutoFilterDTO implements FilterDTO
{
    private array $containerOwners = [
        'coc',
        'soc',
    ];

    private array $containerTypes = [
        '20dry (<18т)',
        '40hc (<20т)',
    ];

    public function __construct(
        private readonly array $stations,
        private readonly array $points,
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

    public function getStations(): array
    {
        return $this->stations;
    }

    public function getPoints(): array
    {
        return $this->points;
    }
}