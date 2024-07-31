<?php

declare(strict_types=1);

namespace App\DTO;

class FilterRailwayDTO
{
    private array $containerOwners = [
        'soc',
        'coc',
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