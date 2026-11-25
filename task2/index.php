<?php
declare(strict_types=1);

use App\Models\Product;
use App\Models\User;
use App\Services\PriceFormatter;

// ЗАДАНИЕ 2: собственный загрузчик по правилу PSR-4 (App\ -> src/).
spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $relative = substr($class, strlen($prefix));
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($path)) {
        require $path;
    }
});

$customer = new User('Анна', 'anna@example.com');
$product = new Product('Компьютерная мышь', 1250.50);

echo "ЗАДАЧА 2. АВТОЗАГРУЗКА PSR-4\n";
echo 'Пользователь: ' . $customer->getInfo() . PHP_EOL;
echo 'Товар: ' . $product->title . PHP_EOL;
echo 'Цена: ' . PriceFormatter::format($product->price) . PHP_EOL;
