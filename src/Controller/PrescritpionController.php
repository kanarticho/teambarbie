<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Prescritpion;
use App\Form\PrescritpionType;
use App\Repository\PatientRepository;
use App\Repository\PrescritpionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prescritpion")
 */
class PrescritpionController extends AbstractController
{
    /**
     * @Route("/", name="prescritpion_index", methods={"GET"})
     */
    public function index(PrescritpionRepository $prescritpionRepository): Response
    {
        return $this->render('prescritpion/index.html.twig', [
            'prescritpions' => $prescritpionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{idPatient}", name="prescritpion_new", methods={"GET","POST"})
     */
    public function new(Request $request, Patient $idPatient): Response
    {
        $prescritpion = new Prescritpion();
        $form = $this->createForm(PrescritpionType::class, $prescritpion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $prescritpion->setPatient($idPatient);
            $entityManager->persist($prescritpion);
            $entityManager->flush();

            return $this->redirectToRoute('patientDetails', ['id'=>$idPatient->getId()]);
        }

        return $this->render('prescritpion/new.html.twig', [
            'patient' => $idPatient,
            'prescritpion' => $prescritpion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prescritpion_show", methods={"GET"})
     */
    public function show(Prescritpion $prescritpion): Response
    {
        return $this->render('prescritpion/show.html.twig', [
            'prescritpion' => $prescritpion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prescritpion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Prescritpion $prescritpion): Response
    {
        $form = $this->createForm(PrescritpionType::class, $prescritpion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prescritpion_index');
        }

        return $this->render('prescritpion/edit.html.twig', [
            'prescritpion' => $prescritpion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prescritpion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Prescritpion $prescritpion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prescritpion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prescritpion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prescritpion_index');
    }
}
