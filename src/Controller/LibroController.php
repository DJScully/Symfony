<?php

namespace App\Controller;

use App\Entity\Fondo;
use App\Form\FondoType;
use App\Repository\FondoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crud-libro')]
class LibroController extends AbstractController
{
    #[Route('/', name: 'libro_index', methods: ['GET'])]
    public function index(FondoRepository $fondoRepository): Response
    {
        return $this->render('libro/index.html.twig', [
            'fondos' => $fondoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'libro_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $fondo = new Fondo();
        $form = $this->createForm(FondoType::class, $fondo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fondo);
            $entityManager->flush();

            return $this->redirectToRoute('libro_index');
        }

        return $this->render('libro/new.html.twig', [
            'fondo' => $fondo,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'libro_show', methods: ['GET'])]
    public function show(Fondo $fondo): Response
    {
        return $this->render('libro/show.html.twig', [
            'fondo' => $fondo,
        ]);
    }

    #[Route('/{id}/edit', name: 'libro_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fondo $fondo): Response
    {
        $form = $this->createForm(FondoType::class, $fondo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libro_index');
        } 

        return $this->render('libro/edit.html.twig', [
            'fondo' => $fondo,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'libro_delete', methods: ['POST'])]
    public function delete(Request $request, Fondo $fondo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fondo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fondo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('libro_index');
    }
}
