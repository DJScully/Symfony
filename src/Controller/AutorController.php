<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Editorial;
use App\Entity\Fondo;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorController extends AbstractController
{
    #[Route('/autor', name: 'autor')]
    public function index(EntityManagerInterface $em): Response
    {
        // Inyeccion de dependecias
        // Inyeccion de Control
        //  $entityManager = new EntityManager();
        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager = $this->get('doctrine.entity.manager');
        $autor = new Autor();
        $autor->setTipo('persona');
        $autor->setNombre('Pérez Reverte');

        $autor2 = new Autor();
        $autor2->setTipo('entidad');
        $autor2->setNombre('Banco de España');

        $autor3 = new Autor();
        $autor3->setTipo('persona');
        $autor3->setNombre('J. K. Rowling');

        $autor4 = new Autor();
        $autor4->setTipo('persona');
        $autor4->setNombre('Dmitri Glujovski');

        $autores = [$autor, $autor2, $autor3, $autor4];

        $editorial = new Editorial();
        $editorial->setNombre('Seix Barral');

        $editorial2 = new Editorial();
        $editorial2->setNombre('El Barco de Vapor');

        $editorial3 = new Editorial();
        $editorial3->setNombre('Timunmas');
        

        $em->persist($autor);
        $em->persist($autor2);
        $em->persist($autor3);
        $em->persist($autor4);
    
        $em->persist($editorial);
        $em->persist($editorial2);
        $em->persist($editorial3);

        $fondo = new Fondo();
        $fondo->setTitulo('Harry Potter');
        $fondo->setIsbn('84-204-8312-5');
        $fondo->setEdicion(1998);
        $fondo->setPublicacion(1998);
        $fondo->setCategoria('Novela');
        $fondo->setEditorial($editorial);
        $fondo->addAutor($autor);

        $em->persist($fondo);
        $em->flush();

        dump($autor);

//        $em = new \Doctrine\ORM\EntityManager();

        return $this->render('autor/index.html.twig', [
            'controller_name' => 'AutorController',
        ]);
    }


    #[Route('/autor/new', name: 'autor-new')]
    public function new(): Response{
        return $this->render('autor/new.html.twig');
    }

    #[Route('/autor/create', name: 'autor-create')]
    public function create(Request $request, EntityManagerInterface $em): Response {

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

        return $this->redirectToRoute('autor-new');
    }
}
