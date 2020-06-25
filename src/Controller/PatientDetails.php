<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Prescritpion;
use App\Form\PrescritpionType;
use App\Repository\MedicationRepository;
use App\Repository\PrescritpionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PatientDetails extends AbstractController
{
    /**
     * @Route("patientDetails/{id}", name="patientDetails")
     */
    public function index(Patient $patient, PrescritpionRepository $prescritpionRepository) : Response
    {
        $prescritpion = $prescritpionRepository->find($patient->getId());
        return $this->render('home/patientDetails.html.twig', [
            'patient' => $patient,
            'prescritpion' => $prescritpion
        ]);
    }
}
