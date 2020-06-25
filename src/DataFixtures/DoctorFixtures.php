<?php


namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use faker;

class DoctorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=20; $i++) {
            $doctor = new Patient();
            $doctor->setFirstname($faker->firstName);
            $doctor->setLastname($faker->lastName);
            $doctor->setUser($this->getReference('user_'));
            $manager->persist($doctor);
            $this->addReference('doctor_' . $i, $doctor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }

}