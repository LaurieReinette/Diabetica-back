<?php

namespace App\DataFixtures;

use App\Entity\Bloodsugar;
use App\Entity\User;

use Faker\Factory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        $users = [];

        $manager->flush();
    }
}
