<?php

namespace App\Controller;
use App\FakeData\Catalogo;
use App\Repository\LibroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogoController extends AbstractController
{
    #[Route('/catalogo', name: 'catalogo')]
    public function index(): Response
    {

        
        $fondos = Catalogo::$fondos;
        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos]);
    }
    #[Route('/catalogo', name: 'catalogo')]
    public function ver(LibroRepository $libroRepository){
        $libro = $libroRepository->findAll();
        $fondos = Catalogo::$fondos;
        dump($libro[0]->getTitulo());

        return $this->render('catalogo/index.html.twig',[
            'libro'=>$libro, 'fondos' => $fondos
        ]);
    }
}
