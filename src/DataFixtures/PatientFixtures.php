<?php


namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=50; $i++) {
            $patient = new Patient();
            $patient->setFirstname($faker->firstName);
            $patient->setLastname($faker->lastName);
            $patient->setPhone($faker->e164PhoneNumber);
            $patient->setDoctor($this->getReference('doctor_' . rand(0,5)));
            $manager->persist($patient);
            $this->addReference('patient_' . $i, $patient);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [DoctorFixtures::class];
    }

}
