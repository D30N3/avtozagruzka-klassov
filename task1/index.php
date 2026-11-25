<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    if (str_contains($class, '\\')) {
        return;
    }
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (is_file($file)) {
        require $file;
    }
});

$user = new User('Иван', 'ivan@example.com');
$products = [new Product('Книга по PHP', 1250.50), new Product('Блокнот', 249.50)];
$order = new Order($user, $products);

echo "ЗАДАЧА 1. ПРОСТАЯ АВТОЗАГРУЗКА\n";
echo 'Покупатель: ' . $user->getInfo() . PHP_EOL;
foreach ($products as $product) {
    echo 'Товар: ' . $product->getInfo() . PHP_EOL;
}
echo 'Итого: ' . number_format($order->getTotal(), 2, '.', ' ') . ' руб.' . PHP_EOL;
