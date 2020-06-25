<?php


namespace App\Controller;


use App\Entity\Mood;
use App\Entity\Moodday;
use App\Entity\Patient;
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
    public function index(Patient $patient, MoodRepository $moodRepository, Request $request): Response
    {
        $moodday = new Moodday();
        $form = $this->createForm(MooddayType::class, $moodday);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($moodday);
            $entityManager->flush();

            return $this->redirectToRoute('moodday_index');
        }
        return $this->render('home/patient.html.twig', ['patient' => $patient, 'moodday' => $moodday,
            'form' => $form->createView(), ]);
    }
}