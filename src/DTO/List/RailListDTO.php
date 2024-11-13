<?php

declare(strict_types=1);

namespace Tarifficator\DTO\List;

class RailListDTO implements ListDTO
{
    public function __construct(
        public readonly string $contractor,
        public readonly string $destination,
        public readonly string $containerOwner,
        public readonly string $containerType,
        public readonly string $deliveryCost,
        public readonly string $securityCost,
        public readonly string $deliveryPriceValidFrom,
        public readonly string $comment,
        public readonly bool   $isActive,
    )
    {
    }
}