<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Repository\AutorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AutorController extends AbstractController{
    #[Route('/autor', name: 'autor')]
    public function index(AutorRepository $autorRepository): Response
    {
        $fondos = $autorRepository->findAll();

     
        // $fondos = Catalogo::$fondos;
         return $this->render('autor/index.html.twig', [
             'fondos' => $fondos]);
    }


    #[Route('/autor/new', name: 'autor-new')]
    public function new(): Response{
        return $this->render('autor/new.html.twig');
    }

    #[Route('/autor/create', name: 'autor-create')]
    public function create( Request $request, EntityManagerInterface $em): Response {

        $nombre= $request->request->get('nombre');
        $tipo= $request->request->get('tipo');

        $autor = new Autor();
        $autor->setNombre($nombre);
        $autor->setTipo($tipo);

        try{
            $autor->getId();
            $em->flush();
        } catch(\Exception $ex){
            $ex->getMessage();
            $ex->getCode();
            $ex->getTraceAsString();
        }

        $em->persist($autor);
        $em->flush();

        return $this->redirectToRoute('autor');
    }

    #[Route('/autor/ver/{id}', name: 'autor-ver')]
    public function ver($id, AutorRepository $autorRepository): Response{
        $autor = $autorRepository->find($id);
        return $this->render('autor/ver.html.twig',[
            'autor' => $autor]);
   }


    #[Route('/autor/actualizar/{id}', name: 'autor-act')]
    public function actualizar($id, AutorRepository $autorRepository): Response{
        $autor = $autorRepository->find($id);
        return $this->render('autor/actualizar.html.twig',[
            'autor' => $autor]);
   }

    #[Route('/autor/update/{id}', name: 'autor-update')]
    public function update($id, Request $request, AutorRepository $autorRepository, EntityManagerInterface $em){
        $autor = $autorRepository->find($id);
        $nombre= $request->request->get('nombre');
        $tipo= $request->request->get('tipo');
        $autor->setNombre($nombre);
        $autor->setTipo($tipo);

        $em->persist($autor);
        $em->flush();
        return $this->redirectToRoute('autor');
    }

    #[Route('autor/delete/{id}', name: 'autor-delete')]

    public function delete($id, AutorRepository $autorRepository, EntityManagerInterface $em){
        $autor = $autorRepository->find($id);
        

        $em->remove($autor);
        $em->flush();
        return $this->redirectToRoute('autor');
    }
}
