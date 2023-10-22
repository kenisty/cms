<?php declare(strict_types=1);

namespace App\Denormalizer;

use App\Dto\DefaultDtoInterface;

/**
 * @template T
 */
interface DefaultDenormalizerInterface
{
    /**
     * @param array<string, mixed> $data
     *
     * @return T
     */
    public static function denormalize(array $data): mixed;
}
