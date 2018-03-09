<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFix extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $usernames = ['Employé', 'Responsable'];

        foreach ($usernames as $i => $username) {
            $user = (new User())
            ->setUsername($username)
            ->setPassword(
                password_hash('secret', PASSWORD_BCRYPT, ['cost' => 12])
            )
            ->setWorker($this->getReference("worker-$i"));

            if ($username === 'Responsable') {
                $user->setRoles(['ROLE_MANAGER']);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [WorkerFixtures::class];
    }
}
