<?php declare(strict_types=1);

namespace App\Attribute;

use Attribute;

#[Attribute]
class TransferEntity
{
    public function __construct(
        public string $model,
        public string $normalizer,
        public string $denormalizer,
    ) { }
}
