<?php
declare(strict_types=1);

namespace App\Models;

final class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {}

    public function getInfo(): string
    {
        return "{$this->name} ({$this->email})";
    }
}
