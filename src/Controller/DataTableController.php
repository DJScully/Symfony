<?php

namespace App\Controller;

use App\Repository\FondoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DataTableController extends AbstractController
{
    #[Route('/datatable', name: 'data_table')]
    public function index(): Response
    {

        
        return $this->render('data_table/index.html.twig', [
            'controller_name' => 'DataTableController',
        ]);
    }

    #[Route('/json_libro', name: 'json_libro')]
    public function json_libro(FondoRepository $fondoRepository): Response
    {
        $fondos = $fondoRepository->findAll();

        $fondosArray = [];

        foreach ( $fondos as $fondo ) {
            $fondoArray = [
                 $fondo->getTitulo(),
                 $fondo->getISBN(),
                 $fondo->getEdicion(),
                 $fondo->getPublicacion()
            ];
            $fondosArray[] = $fondoArray;
        }

        $nana = [
            "data" => $fondosArray
        ];
      

        

        return new JsonResponse($nana);

        
       
    }
}
