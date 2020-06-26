<?php


namespace App\DataFixtures;


use App\Entity\Medication;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class MedicationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=20; $i++) {
            $medication = new Medication();
            $medication->setName($faker->word);
            $manager->persist($medication);
        }
        $manager->flush();
    }
}