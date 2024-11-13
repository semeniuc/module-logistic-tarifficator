<?php

declare(strict_types=1);

namespace Tarifficator\DTO\List;

class AutoListDTO implements ListDTO
{
    public function __construct(
        public readonly string $contractor,
        public readonly string $point,
        public readonly string $containerOwner,
        public readonly string $containerType,
        public readonly string $deliveryCost,
        public readonly string $deliveryValidTill,
        public readonly string $terminalCost,
        public readonly string $terminalValidTill,
        public readonly string $comment,
        public readonly bool   $isActive,
    )
    {
    }
}