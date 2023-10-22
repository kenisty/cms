<?php

namespace App\Entity;

use App\Attributes\TransferEntity;
use App\Denormalizer\ApiUserDenormalizer;
use App\Entity\Trait\HistoryTrait;
use App\Normalizer\ApiUserNormalizer;
use App\Repository\ApiUserRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Stringable;

#[ORM\Entity(repositoryClass: ApiUserRepository::class)]
#[TransferEntity(model: 'api_user', normalizer: ApiUserNormalizer::class, denormalizer: ApiUserDenormalizer::class)]
class ApiUser implements Stringable
{
    use HistoryTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $email = null;

    public function __construct()
    {
        $this->setCreatedAt(new DateTimeImmutable());
        $this->setUpdatedAt(new DateTimeImmutable());
    }

    public function __toString(): string
    {
        return $this->firstname . ' ' . $this->lastname . ' - ' . $this->email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
