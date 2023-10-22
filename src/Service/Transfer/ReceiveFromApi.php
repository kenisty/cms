<?php

namespace App\Service\Transfer;

use App\Denormalizer\ApiUserDenormalizer;
use App\Denormalizer\DefaultDenormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class ReceiveFromApi
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) { }

    public function writeToDatabase(array $normalizedModel): void
    {
        $meta = $normalizedModel['meta'];
        $data = $normalizedModel['data'];

        $denormalizer = $this->findDenormalizer($meta['model']);
        $denormalizedModel = $denormalizer->denormalize($data);

        if ($meta['mode'] === 'create') {
            $this->entityManager->persist($denormalizedModel);
        }

        $this->entityManager->flush();
    }

    private function findDenormalizer(string $model): DefaultDenormalizerInterface
    {
        return match ($model) {
            'api_user' => new ApiUserDenormalizer(),
        };
    }
}