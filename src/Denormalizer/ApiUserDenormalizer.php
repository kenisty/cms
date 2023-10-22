<?php

namespace App\Denormalizer;

use App\Dto\User\ApiUserDataV1;
use App\Entity\ApiUser;
use App\Service\TypeSafe;

/**
 * @implements DefaultDenormalizerInterface<ApiUser>
 */
class ApiUserDenormalizer implements DefaultDenormalizerInterface
{
    /**
     * @return ApiUser
     */
    public static function denormalize(array $data): mixed
    {
        $dto = ApiUserDataV1::fromArray($data);

        return (new ApiUser())
            ->setFirstname($dto->getFirstname())
            ->setLastname($dto->getLastname())
            ->setEmail($dto->getEmail());
    }
}