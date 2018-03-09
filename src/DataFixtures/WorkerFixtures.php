<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class WorkerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
      $firstNames = ['Geroges' , 'François'];

      foreach($firstNames as $i => $firstname)
      {
      $worker = (new Worker())

         ->setlastName('Bund')
         ->setfirstName($firstname)

         ->setjob($this->getReference("job-$i"))
         ->setworkertime('23.5');

         $this->addReference("worker-$i", $worker);
         $manager->persist($worker);
        $manager->flush();
      }

    }
      public function getDependencies():array
      {
        return [JobFix::class];
      }

}
