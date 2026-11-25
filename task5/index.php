<?php
declare(strict_types=1);

use App\Book;
use App\Electronics;
use App\Product;

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $relative = substr($class, strlen($prefix));
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

$catalog = [
    new Book('PHP 8 на практике', 1250),
    new Electronics('Ноутбук', 60000, 10),
    new Book('Алгоритмы и структуры данных', 2200),
    new Electronics('Наушники', 4500, 5),
    new Book('Чистый код', 1800),
];

$total = 0.0;
echo "ЗАДАЧА 5. КАТАЛОГ ТОВАРОВ\n";
foreach ($catalog as $product) {
    echo $product->getInfo() . PHP_EOL;
    $total += $product->getFinalPrice();
}
echo 'Сумма конечных цен: ' . number_format($total, 2, '.', ' ') . ' руб.' . PHP_EOL;
echo 'Всего товаров создано: ' . Product::getCount() . PHP_EOL;
