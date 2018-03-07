<?php

namespace App\Tests;

use App\Entity\Worker;
use PHPUnit\Framework\TestCase;

class WorkerTest extends TestCase
{


    public function testCreate()
    {
        $worker = new worker();
        $this->assertInstanceOf(Worker ::class,  $worker ,
       'worker is not an instance of Worker');

       return $worker;
    }


    /**
    *@dataProvider providerAccessoirValues
    *@depends testCreate
    */
    public function textFill(string $name , string $value , Worker $worker)
    {
      $getter = "get$name";
      $setter = "set$name";

        $worker->$setter($value);

        $this->asserSame($value, $worker->$getter());
    }

    public function providerAccessoirValues(): array
    {
      return [['lastName' , 'Gruh'],
              ['firstName' , 'Jean'],
              ['workertime' , '23.5']
            ];
    }
}
