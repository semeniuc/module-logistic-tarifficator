<?php

declare(strict_types=1);

namespace App\DTO\List;

class SeaListDTO implements ListDTO
{
    public function __construct(
        public readonly string $contractor,
        public readonly string $route,
        public readonly string $destination,
        public readonly string $containerOwner,
        public readonly string $containerType,
        public readonly string $deliveryCost,
        public readonly string $deliveryPriceValidFrom,
        public readonly string $comment,
        public readonly bool $isActive,
    ) {
    }
}