<?php
declare(strict_types=1);
/**
 * Добавить лог в operation
*/
interface IA
{
    public function operation(): void;
}

class A implements IA
{
    public function operation(): void
    {
        // some operation logic
        echo "Executing operation in A\n";
    }
}

class B implements IA
{
    public function operation(): void
    {
        // some operation logic
        echo "Executing operation in B\n";
    }
}

class Factory
{
    public function create(): IA
    {
        return new A();
    }
}

$factory = new Factory();
$a = $factory->create();
$a->operation();
