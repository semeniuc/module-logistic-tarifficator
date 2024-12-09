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
        private readonly array $terminals,
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

    public function getTerminals(): array
    {
        return $this->terminals;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }
}