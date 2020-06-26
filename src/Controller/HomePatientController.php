<?php


namespace App\Controller;


use App\Entity\Mood;
use App\Entity\Moodday;
use App\Entity\Patient;
use App\Entity\Quote;
use App\Repository\PrescritpionRepository;
use App\Repository\MooddayRepository;
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
    public function index(Request $request, Patient $patient, QuoteRepository $quoteRepository, MooddayRepository $mooddayRepository, PrescritpionRepository $prescritpionRepository): Response
    {
        $prescritpions = $prescritpionRepository->findBy(['patient' => $patient]);
        $currentDate = new \DateTime('now');
        $quotes = $quoteRepository->findAll();
        $key = array_rand($quotes);
        $mooddaySend = $mooddayRepository->findOneBy(array('patient' => $patient, 'date' => $currentDate));

        $moodday = new Moodday();
        $form = $this->createForm(MooddayType::class, $moodday);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $moodday->setPatient($patient);
            $moodday->setDate(new \DateTime('now'));
            $entityManager->persist($moodday);
            $entityManager->flush();

            return $this->redirectToRoute('homePatient', ['id' => $patient->getId()]);
        }

        return $this->render('home/patient.html.twig', [
            'patient' => $patient,
            'quote' => $quotes[$key],
            'moodday' => $moodday,
            'form' => $form->createView(),
            'prescritpions' => $prescritpions,
            'mooddaySend' => $mooddaySend,
        ]);
    }
}
