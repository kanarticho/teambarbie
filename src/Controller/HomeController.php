<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Doctor;
use App\Repository\DoctorRepository;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        $patient = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findOneBy([]);
        $doctor = $this->getDoctrine()
            ->getRepository(doctor::class)
            ->findOneBy([]);

        return $this->render('home/index.html.twig', [
            'patient'=>$patient,
            'doctor'=>$doctor,
        ]);
    }
}
