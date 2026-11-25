<?php
declare(strict_types=1);

class Developer extends Employee
{
    public function __construct(string $name, float $salary, private int $experienceYears)
    {
        if ($experienceYears < 0) {
            throw new InvalidArgumentException('Стаж не может быть отрицательным.');
        }
        parent::__construct($name, $salary);
    }

    public function calculateBonus(): float
    {
        return max(self::MIN_BONUS, $this->salary * 0.15 + $this->experienceYears * 1000);
    }
}
