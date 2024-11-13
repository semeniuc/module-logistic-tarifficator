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
        private readonly array $pods,
        private readonly array $destinations,
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

    public function getPods(): array
    {
        return $this->pods;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }
}