<?php

namespace App\Controller;

use App\Entity\PlantingPeriod;
use App\Form\PlantingPeriodType;
use App\Repository\PlantingPeriodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planting-period")
 */
class PlantingPeriodController extends AbstractController
{
    /**
     * @Route("/", name="planting_period_index", methods={"GET"})
     */
    public function index(PlantingPeriodRepository $plantingPeriodRepository): Response
    {
        return $this->render('planting_period/index.html.twig', [
            'planting_periods' => $plantingPeriodRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="planting_period_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $plantingPeriod = new PlantingPeriod();
        $form = $this->createForm(PlantingPeriodType::class, $plantingPeriod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($plantingPeriod);
            $entityManager->flush();

            return $this->redirectToRoute('planting_period_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planting_period/new.html.twig', [
            'planting_period' => $plantingPeriod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planting_period_show", methods={"GET"})
     */
    public function show(PlantingPeriod $plantingPeriod): Response
    {
        return $this->render('planting_period/show.html.twig', [
            'planting_period' => $plantingPeriod,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="planting_period_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PlantingPeriod $plantingPeriod): Response
    {
        $form = $this->createForm(PlantingPeriodType::class, $plantingPeriod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planting_period_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planting_period/edit.html.twig', [
            'planting_period' => $plantingPeriod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planting_period_delete", methods={"POST"})
     */
    public function delete(Request $request, PlantingPeriod $plantingPeriod): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plantingPeriod->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($plantingPeriod);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planting_period_index', [], Response::HTTP_SEE_OTHER);
    }
}
