<?php


namespace App\Controller;


use App\Entity\Doctor;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeDoctorController extends AbstractController
{
    /**
     * @Route("homeDoctor/{id}", name="homeDoctor")
     */
    public function index(Doctor $doctor, PatientRepository $patientRepository): Response
    {
        return $this->render('home/doctor.html.twig', [
            'doctor' => $doctor,
            'patients' => $doctor->getPatients()
        ]);
    }
}