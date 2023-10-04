<?php

declare(strict_types=1);

namespace App\Domain;

use Ramsey\Uuid\UuidInterface;

final class Contact
{
    public function __construct(
        public readonly UuidInterface $id,
        public readonly string $name,
    )
    {
    }
}
