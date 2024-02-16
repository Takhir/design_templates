<?php

interface Mediator
{
    public function getWorker();
}

abstract class Worker
{
    private string $position;

    /**
     * @param string $position
     */
    public function __construct(string $position)
    {
        $this->position = $position;
    }

    public function sayHello()
    {
        printf('Hello');
    }

    public function work()
    {
        return $this->position . ' is working';
    }
}

class InfoBase
{
    public function printInfo(Worker $worker)
    {
        printf($worker->work());
    }
}

class WorkerInfoBaseMediator implements Mediator
{

    private Worker $worker;
    private InfoBase $infobase;

    /**
     * @param Worker $worker
     * @param InfoBase $infobase
     */
    public function __construct(Worker $worker, InfoBase $infobase)
    {
        $this->worker = $worker;
        $this->infobase = $infobase;
    }

    public function getWorker()
    {
        $this->infobase->printInfo($this->worker);
    }
}

class Developer extends Worker
{

}

class Designer extends Worker
{

}

$developer = new Developer('developer middle');
$designer = new Designer('designer senior');
$infobase = new InfoBase();
$workerInfoBaseMediator = new WorkerInfoBaseMediator($developer, $infobase);
$workerInfoBaseMediator2 = new WorkerInfoBaseMediator($designer, $infobase);

$workerInfoBaseMediator2->getWorker();