<?php

declare(strict_types=1);

namespace App\DTO;

class FilterContainerDTO
{
    private array $containerOwners = [
        'soc',
        'coc',
    ];

    private array $containerTypes = [
        '20dry',
        '40hc',
    ];

    public function __construct(
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
    public function getDestinations(): array
    {
        return $this->destinations;
    }
}