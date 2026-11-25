<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (is_file($file)) {
        require $file;
    }
});

$shapes = [new Circle(5), new Rectangle(4, 6), new Triangle(3, 4, 5), new Circle(2.5)];
echo "ЗАДАЧА 3. АБСТРАКТНЫЙ КЛАСС SHAPE\n";
foreach ($shapes as $shape) {
    echo $shape->describe() . PHP_EOL;
}
