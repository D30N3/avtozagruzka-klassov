<?php
declare(strict_types=1);

class Product
{
    public function __construct(
        public readonly string $title,
        private float $price,
    ) {
        if ($price < 0 || trim($title) === '') {
            throw new InvalidArgumentException('Название должно быть заполнено, цена — неотрицательной.');
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getInfo(): string
    {
        return sprintf('%s — %s руб.', $this->title, number_format($this->price, 2, '.', ' '));
    }
}
