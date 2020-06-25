<?php

namespace App\Controller;

use App\Entity\Moodday;
use App\Entity\Patient;
use App\Form\MooddayType;
use App\Repository\MooddayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moodday")
 */
class MooddayController extends AbstractController
{
    /**
     * @Route("/", name="moodday_index", methods={"GET"})
     */
    public function index(MooddayRepository $mooddayRepository): Response
    {
        return $this->render('moodday/index.html.twig', [
            'mooddays' => $mooddayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{idPatient}", name="moodday_new", methods={"GET","POST"})
     */
    public function new(Request $request, Patient $idPatient): Response
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

        return $this->render('moodday/new.html.twig', [
            'moodday' => $moodday,
            'patient' => $idPatient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="moodday_show", methods={"GET"})
     */
    public function show(Moodday $moodday): Response
    {
        return $this->render('moodday/show.html.twig', [
            'moodday' => $moodday,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="moodday_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Moodday $moodday): Response
    {
        $form = $this->createForm(MooddayType::class, $moodday);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('moodday_index');
        }

        return $this->render('moodday/edit.html.twig', [
            'moodday' => $moodday,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="moodday_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Moodday $moodday): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moodday->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($moodday);
            $entityManager->flush();
        }

        return $this->redirectToRoute('moodday_index');
    }
}
