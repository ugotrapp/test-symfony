<?php

namespace App\Controller;

use App\Entity\HarvestPeriod;
use App\Form\HarvestPeriodType;
use App\Repository\HarvestPeriodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/harvest-period")
 */
class HarvestPeriodController extends AbstractController
{
    /**
     * @Route("/", name="harvest_period_index", methods={"GET"})
     */
    public function index(HarvestPeriodRepository $harvestPeriodRepository): Response
    {
        return $this->render('harvest_period/index.html.twig', [
            'harvest_periods' => $harvestPeriodRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="harvest_period_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $harvestPeriod = new HarvestPeriod();
        $form = $this->createForm(HarvestPeriodType::class, $harvestPeriod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($harvestPeriod);
            $entityManager->flush();

            return $this->redirectToRoute('harvest_period_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('harvest_period/new.html.twig', [
            'harvest_period' => $harvestPeriod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="harvest_period_show", methods={"GET"})
     */
    public function show(HarvestPeriod $harvestPeriod): Response
    {
        return $this->render('harvest_period/show.html.twig', [
            'harvest_period' => $harvestPeriod,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="harvest_period_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HarvestPeriod $harvestPeriod): Response
    {
        $form = $this->createForm(HarvestPeriodType::class, $harvestPeriod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('harvest_period_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('harvest_period/edit.html.twig', [
            'harvest_period' => $harvestPeriod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="harvest_period_delete", methods={"POST"})
     */
    public function delete(Request $request, HarvestPeriod $harvestPeriod): Response
    {
        if ($this->isCsrfTokenValid('delete'.$harvestPeriod->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($harvestPeriod);
            $entityManager->flush();
        }

        return $this->redirectToRoute('harvest_period_index', [], Response::HTTP_SEE_OTHER);
    }
}
