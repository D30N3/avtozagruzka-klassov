<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (is_file($file)) {
        require $file;
    }
});

$employees = [
    new Manager('Анна Смирнова', 80000),
    new Developer('Иван Петров', 90000, 3),
    new Manager('Олег Ким', 2000),
    new Developer('Мария Орлова', 70000, 5),
    new Developer('Денис Ли', 3000, 0),
];

$total = 0.0;
echo "ЗАДАЧА 4. СОТРУДНИКИ\n";
foreach ($employees as $employee) {
    echo $employee->getInfo() . PHP_EOL;
    $total += $employee->getSalary() + $employee->calculateBonus();
}
echo 'Всего сотрудников: ' . Employee::getEmployeeCount() . PHP_EOL;
echo 'Общая сумма выплат: ' . number_format($total, 2, '.', ' ') . ' руб.' . PHP_EOL;
