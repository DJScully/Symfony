<?php

namespace App\Controller;

use App\Entity\Editorial;
use App\Repository\EditorialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditorialController extends AbstractController
{
    #[Route('/editorial', name: 'editorial')]
    public function index(EditorialRepository $editorialRepository): Response
    {
        $editorial = $editorialRepository->findAll();

     
        // $fondos = Catalogo::$fondos;
         return $this->render('editorial/index.html.twig', [
             'fondos' => $editorial]);
    }

    #[Route('/editorial/ver/{id}', name: 'editorial-ver-uno')]
    public function ver($id, EditorialRepository $editorialRepository): Response
    {
        $editorial = $editorialRepository->find($id);

     
        // $fondos = Catalogo::$fondos;
         return $this->render('editorial/ver.html.twig', [
             'fondos' => $editorial]);
    }

    #[Route('/editorial/new', name: 'editorial-new')]
    public function new(): Response{
        return $this->render('editorial/new.html.twig');
    }

    #[Route('/editorial/create', name: 'editorial-create')]
    public function create( Request $request, EntityManagerInterface $em): Response {

        $nombre= $request->request->get('nombre');

        $editorial = new Editorial();
        $editorial->setNombre($nombre);

        $em->persist($editorial);
        $em->flush();

        return $this->redirectToRoute('editorial');
    }

    #[Route('/editorial/actualizar/{id}', name: 'editorial-act')]
    public function actualizar($id, EditorialRepository $EditorialRepository): Response{
        $editorial = $EditorialRepository->find($id);
        return $this->render('editorial/actualizar.html.twig',[
            'autor' => $editorial]);
   }

    #[Route('/editorial/update/{id}', name: 'editorial-update')]
    public function update($id, Request $request, EditorialRepository $EditorialRepository, EntityManagerInterface $em){
        $editorial = $EditorialRepository->find($id);
        $nombre= $request->request->get('nombre');
       
        $editorial->setNombre($nombre);

        $em->persist($editorial);
        $em->flush();
        return $this->redirectToRoute('editorial');
    }

    #[Route('editorial/delete/{id}', name: 'editorial-delete')]
    public function delete($id, EditorialRepository $EditorialRepository, EntityManagerInterface $em){
        $editorial = $EditorialRepository->find($id);
        $em->remove($editorial);
        $em->flush();
        return $this->redirectToRoute('editorial');
    }

    public function __toString()
    {
        return "Hola";
    }
}

