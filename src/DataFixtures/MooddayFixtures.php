<?php


namespace App\DataFixtures;

use App\Entity\Moodday;
use App\Entity\Patient;
use App\Entity\Mood;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;


class MooddayFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<100; $i++) {
            $moodDay = new Moodday();
            $moodDay->setDate($faker->dateTimeBetween('-7 days', 'today', $timezone=null));
            $moodDay->setPatient($this->getReference('patient_' . rand(0,18)));
            $moodDay->setMood($this->getReference('mood_' . rand(1,5)));
            $manager->persist($moodDay);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [PatientFixtures::class, MoodFixtures::class];
    }
}
