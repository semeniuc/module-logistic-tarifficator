<?php

declare(strict_types=1);

namespace App\DTO\List;

class ContainerListDTO implements ListDTO
{
    public function __construct(
        public readonly string $contractor,
        public readonly string $destination,
        public readonly string $containerType,
        public readonly string $rentalCost,
        public readonly string $rentalPriceValidFrom,
        public readonly string $comment,
    ) {
    }
}