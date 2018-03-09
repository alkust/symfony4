<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JobFix extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titles=['Cuisinier','Marchand','Balayeur','Comptable','idéfini'];
    for($i=0;$i < count($titles);$i++)
      {
        $job = (new Job())
        ->setTitle($titles[array_rand($titles)])
        ->setSummary('Payé trop cher')
        ->setWage(random_int(8,80).'.'.random_int(0,70));
          $manager->persist($job);
          $this->addReference("job-$i", $job);
      }
      $manager->flush();
  }
}
