<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("test@domain.com");
        $user->setUsername("Admin");
        $user->setPassword("$2y$12$0IGfhQJuitCcPzXlDSKAm.IQ1o1.i9zSfXTX1oT5KiYQsanhVVeeG");
        $user->setLanguage("pt");
        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActivityTypeFixtures::class,
        ];
    }
}
