<?php


namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class DoctorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=6; $i++) {
            $doctor = new Doctor();
            $doctor->setFirstname($faker->firstName);
            $doctor->setLastname($faker->lastName);
            $manager->persist($doctor);
            $this->addReference('doctor_' . $i, $doctor);
        }

        $manager->flush();
    }
}
