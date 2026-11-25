<?php
declare(strict_types=1);

namespace App;

abstract class Product
{
    public const TAX = 0.2;
    private static int $count = 0;

    public function __construct(public readonly string $title, protected float $price)
    {
        if (trim($title) === '' || $price < 0) {
            throw new \InvalidArgumentException('У товара должно быть название и неотрицательная цена.');
        }
        self::$count++;
    }

    abstract public function getFinalPrice(): float;

    public function getInfo(): string
    {
        return sprintf(
            '%s (%s): базовая цена %.2f руб., конечная цена %.2f руб.',
            $this->title,
            (new \ReflectionClass($this))->getShortName(),
            $this->price,
            $this->getFinalPrice(),
        );
    }

    public static function getCount(): int
    {
        return self::$count;
    }
}
