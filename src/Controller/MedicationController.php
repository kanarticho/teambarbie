<?php

namespace App\Controller;

use App\Entity\Medication;
use App\Form\MedicationType;
use App\Repository\MedicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medication")
 */
class MedicationController extends AbstractController
{
    /**
     * @Route("/", name="medication_index", methods={"GET"})
     */
    public function index(MedicationRepository $medicationRepository): Response
    {
        return $this->render('medication/index.html.twig', [
            'medications' => $medicationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="medication_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medication = new Medication();
        $form = $this->createForm(MedicationType::class, $medication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medication);
            $entityManager->flush();

            return $this->redirectToRoute('medication_index');
        }

        return $this->render('medication/new.html.twig', [
            'medication' => $medication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medication_show", methods={"GET"})
     */
    public function show(Medication $medication): Response
    {
        return $this->render('medication/show.html.twig', [
            'medication' => $medication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medication_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medication $medication): Response
    {
        $form = $this->createForm(MedicationType::class, $medication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medication_index');
        }

        return $this->render('medication/edit.html.twig', [
            'medication' => $medication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medication_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medication $medication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medication->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medication_index');
    }
}
