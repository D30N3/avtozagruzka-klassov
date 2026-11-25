<?php
declare(strict_types=1);

namespace App\Models;

final class Product
{
    public function __construct(
        public readonly string $title,
        public readonly float $price,
    ) {
        if ($price < 0) {
            throw new \InvalidArgumentException('Цена не может быть отрицательной.');
        }
    }
}
