<?php
declare(strict_types=1);

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

//class Factory
//{
//    public function create(): IA
//    {
//        return new A();
//    }
//}
//
//$factory = new Factory();
//$a = $factory->create();
//$a->operation();


class LoggingDecorator implements IA
{
    private IA $wrapped;

    public function __construct(IA $wrapped)
    {
        $this->wrapped = $wrapped;
    }

    public function operation(): void
    {
        // Добавляем лог перед операцией
        echo "[LOG] Starting operation...\n";

        $this->wrapped->operation();

        // Лог после операции
        echo "[LOG] Operation finished.\n";
    }
}

class Factory
{
    public function create(): IA
    {
        $obj = new A(); // или B
        return new LoggingDecorator($obj);
    }
}

$factory = new Factory();
$a = $factory->create();
$a->operation();
