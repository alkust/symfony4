<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JobFix extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $titles = ['Cuisinier' , 'Marchand' , 'Aventurier' , 'Clown' , 'Voleur'];

      foreach($titles as $title){
        $manager->persist(
          (new Job())
          ->setTitle($title)
          ->setSummary('Un Super boulot')
          ->setWage(random_int(8 ,88). '.' .random_int(0 ,9) . '0')
        );

      }

        $manager->flush();
    }
}
