<?php


namespace App\Controller;


use App\Entity\Patient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePatientController extends AbstractController
{
    /**
     * @Route("homePatient/{id}", name="homePatient")
     */
    public function index(Patient $patient): Response
    {
        return $this->render('home/patient.html.twig', ['patient' => $patient]);
    }
}