<?php


namespace App\Controller;


use App\Entity\Patient;
use App\Entity\Quote;
use App\Repository\QuoteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePatientController extends AbstractController
{
    /**
     * @Route("homePatient/{id}", name="homePatient")
     */
    public function index(Patient $patient, QuoteRepository $quoteRepository): Response
    {
        $quotes = $quoteRepository->findAll();
        $key = array_rand($quotes);
        return $this->render('home/patient.html.twig', [
            'patient' => $patient,
            'quote' => $quotes[$key]
        ]);
    }
}
