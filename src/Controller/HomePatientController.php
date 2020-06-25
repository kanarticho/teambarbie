<?php


namespace App\Controller;


use App\Entity\Mood;
use App\Entity\Moodday;
use App\Entity\Patient;
use App\Entity\Quote;
use App\Repository\QuoteRepository;
use App\Form\MooddayType;
use App\Repository\MoodRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePatientController extends AbstractController
{
    /**
     * @Route("homePatient/{id}", name="homePatient")
     */
    public function index(Request $request, Patient $patient, QuoteRepository $quoteRepository, MoodRepository $moodRepository): Response
    {
        $quotes = $quoteRepository->findAll();
        $key = array_rand($quotes);

        $moodday = new Moodday();
          $form = $this->createForm(MooddayType::class, $moodday);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($moodday);
              $entityManager->flush();

              return $this->redirectToRoute('homePatient', ['id' => $patient->getId()]);
          }

        return $this->render('home/patient.html.twig', [
            'patient' => $patient,
            'quote' => $quotes[$key],
            'moodday' => $moodday,
            'form' => $form->createView()
        ]);
    }
}
