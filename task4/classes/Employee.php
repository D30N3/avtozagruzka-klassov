<?php
declare(strict_types=1);

abstract class Employee
{
    public const MIN_BONUS = 500;
    private static int $employeeCount = 0;

    public function __construct(protected string $name, protected float $salary)
    {
        if (trim($name) === '' || $salary < 0) {
            throw new InvalidArgumentException('Имя должно быть заполнено, оклад — неотрицательным.');
        }
        self::$employeeCount++;
    }

    abstract public function calculateBonus(): float;

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getInfo(): string
    {
        return sprintf(
            '%s (%s): оклад %.2f руб., премия %.2f руб.',
            $this->name,
            static::class,
            $this->salary,
            $this->calculateBonus(),
        );
    }

    public static function getEmployeeCount(): int
    {
        return self::$employeeCount;
    }
}
