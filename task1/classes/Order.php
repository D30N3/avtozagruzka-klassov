<?php
declare(strict_types=1);

class Order
{
    /** @param Product[] $products */
    public function __construct(
        public readonly User $customer,
        private array $products,
    ) {
        foreach ($products as $product) {
            if (!$product instanceof Product) {
                throw new InvalidArgumentException('В заказе должны быть только объекты Product.');
            }
        }
    }

    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}
