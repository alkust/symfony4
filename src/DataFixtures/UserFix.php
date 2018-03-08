<?php

namespace App\DataFixtures;



use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFix extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $user = (new User())
        ->setUsername('Pascal')
        ->setPassword('secret');

        $manager->persist($user);
        $manager->flush();
    }
}
