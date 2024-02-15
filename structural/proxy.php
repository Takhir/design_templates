<?php

interface Worker
{
    public function closeHours($hours);

    public function countSalary(): int;
}

class WorkerOutsource implements Worker
{
    private array $hours = [];
    public function closeHours($hours)
    {
        $this->hours[] = $hours;
    }

    public function countSalary(): int
    {
        return array_sum($this->hours) * 500;
    }
}

class WorkerProxy extends WorkerOutsource implements Worker
{
    private int $salary = 0;

    public function countSalary(): int
    {
        if ($this->salary === 0) {
            $this->salary = parent::countSalary();
        }

        return $this->salary;
    }
}

$workerProxy = new WorkerProxy();
$workerProxy->closeHours(10);
var_dump($workerProxy->countSalary());