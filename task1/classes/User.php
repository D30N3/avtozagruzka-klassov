<?php
declare(strict_types=1);

class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {
        if (trim($name) === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Укажите имя и корректный email.');
        }
    }

    public function getInfo(): string
    {
        return "{$this->name} ({$this->email})";
    }
}
