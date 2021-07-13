<?php

namespace App\Controller;

use App\Entity\Seed;
use App\Form\SeedType;
use App\Repository\SeedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seed")
 */
class SeedController extends AbstractController
{
    /**
     * @Route("/", name="seed_index", methods={"GET"})
     */
    public function index(SeedRepository $seedRepository): Response
    {
        return $this->render('seed/index.html.twig', [
            'seeds' => $seedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seed_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $seed = new Seed();
        $form = $this->createForm(SeedType::class, $seed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seed);
            $entityManager->flush();

            return $this->redirectToRoute('seed_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seed/new.html.twig', [
            'seed' => $seed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seed_show", methods={"GET"})
     */
    public function show(Seed $seed): Response
    {
        return $this->render('seed/show.html.twig', [
            'seed' => $seed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seed_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Seed $seed): Response
    {
        $form = $this->createForm(SeedType::class, $seed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seed_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seed/edit.html.twig', [
            'seed' => $seed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seed_delete", methods={"POST"})
     */
    public function delete(Request $request, Seed $seed): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seed->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($seed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seed_index', [], Response::HTTP_SEE_OTHER);
    }
}
