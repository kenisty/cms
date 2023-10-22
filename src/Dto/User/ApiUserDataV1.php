<?php

declare(strict_types=1);

namespace App\Dto\User;

use App\Dto\DefaultDtoInterface;
use App\Service\TypeSafe;

final class ApiUserDataV1 implements DefaultDtoInterface
{
    private const KEY_FIRST_NAME = 'firstname';
    private const KEY_LAST_NAME = 'lastname';
    private const KEY_EMAIL = 'email';

    private ?string $firstname = null;
    private ?string $lastname = null;
    private ?string $email = null;

    public function toArray(): array
    {
        return [
            self::KEY_FIRST_NAME => $this->getFirstname(),
            self::KEY_LAST_NAME => $this->getLastname(),
            self::KEY_EMAIL => $this->getEmail(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return (new self())
            ->setFirstname(TypeSafe::getString($data[self::KEY_FIRST_NAME]) ?? null)
            ->setLastname(TypeSafe::getString($data[self::KEY_LAST_NAME]) ?? null)
            ->setEmail(TypeSafe::getString($data[self::KEY_EMAIL]) ?? null);
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
