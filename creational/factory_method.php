<?php

interface Worker
{
   public function work();
}
class Developer implements Worker
{
   public function work()
   {
       printf('in developing');
   }
}

class Designer implements Worker
{
   public function work()
   {
       printf('in designing');
   }
}

interface WorkerFactory
{
   public static function make();
}

class DeveloperFactory implements WorkerFactory
{

   public static function make()
   {
       return new Developer();
   }
}


class DesignerFactory implements WorkerFactory
{
   public static function make()
   {
       return new Designer();
   }

}

$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

$developer->work();
