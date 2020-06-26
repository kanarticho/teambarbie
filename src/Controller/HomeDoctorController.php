<?php


namespace App\Controller;


use App\Entity\Doctor;
use App\Entity\Patient;
use App\Repository\MooddayRepository;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\Repository;

class HomeDoctorController extends AbstractController
{
    /**
     * @Route("homeDoctor/{id}", name="homeDoctor")
     */
    public function index(Doctor $doctor, PatientRepository $patientRepository, MooddayRepository $mooddayRepository): Response
    {
        $patients = $doctor->getPatients();
        return $this->render('home/doctor.html.twig', [
            'doctor' => $doctor,
            'patients' => $patients
        ]);
    }
}
