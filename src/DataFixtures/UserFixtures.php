<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $patient = new User();
        $patient->setEmail('patient@monsite.com');
        $patient->setRoles(['ROLE_PATIENT']);
        $patient->setPassword($this->passwordEncoder->encodePassword(
            $patient,
            '000000'
        ));

        $manager->persist($patient);

        // Création d’un utilisateur de type “administrateur”
        $doctor = new User();
        $doctor->setEmail('doctor@monsite.com');
        $doctor->setRoles(['ROLE_DOCTOR']);
        $doctor->setPassword($this->passwordEncoder->encodePassword(
            $doctor,
            '000000'
        ));

        $manager->persist($doctor);

        $manager->flush();
    }

}