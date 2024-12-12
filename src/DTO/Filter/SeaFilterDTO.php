<?php

declare(strict_types=1);

namespace Tarifficator\DTO\Filter;

class SeaFilterDTO implements FilterDTO
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
        private readonly array $pols,
        private readonly array $pods,
        private readonly array $destinations,
        private readonly array $terminals,
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

    public function getPols(): array
    {
        return $this->pols;
    }

    public function getPods(): array
    {
        return $this->pods;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }

    public function getTerminals(): array
    {
        return $this->terminals;
    }
}