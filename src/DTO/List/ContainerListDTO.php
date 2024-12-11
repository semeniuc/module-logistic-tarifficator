<?php

declare(strict_types=1);

namespace Tarifficator\DTO\List;

class ContainerListDTO implements ListDTO
{
    public function __construct(
        public readonly string $contractor,
        public readonly string $destination,
        public readonly string $containerType,
        public readonly string $rentalCost,
        public readonly string $rentalPriceValidFrom,
        public readonly string $comment,
        public readonly bool   $isActive,
        public readonly bool   $isService,
        public readonly bool   $isHidden,
    )
    {
    }
}