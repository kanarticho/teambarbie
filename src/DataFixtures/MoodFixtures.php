<?php


namespace App\DataFixtures;

use App\Entity\Mood;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class MoodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=20; $i++) {
            $mood = new Mood();
            $mood->setName($faker->realText(50));
            $mood->setPictogram($faker->imageUrl());
        }
        $manager->flush();
    }
}
