<?php


namespace App\DataFixtures;

use App\Entity\Mood;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class MoodFixtures extends Fixture
{
    const MOODS = [

        'Happy' => [
            'pictogram' => 'soleil.png'
        ],

        'Fine' => [
            'pictogram' => 'nuageux.png'
        ],
        'Just Ok' => [
            'pictogram' => 'nuages.png'
        ],
        'Sad' => [
            'pictogram' => 'pluie.png'
        ],
        'Depressed' => [
            'pictogram' => 'orage.png'
        ],
    ];
    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::MOODS as $name => $data) {
            $mood = new Mood();
            $mood->setName($name);
            $mood->setPictogram($data['pictogram']);
            $manager->persist($mood);
            $i++;
            $this->addReference('mood_' . $i, $mood);
        }
        $manager->flush();
    }
}
