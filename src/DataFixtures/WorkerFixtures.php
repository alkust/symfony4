<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class WorkerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $worker = (new Worker())

         ->setlastName('Gruh')
         ->setfirstName('Jean')
         ->setjob('Facteur-CEB')
         ->setworkertime('23.5')
         ->setwage ('14.22');

      $manager->persist($worker);
        $manager->flush();
    }
}
