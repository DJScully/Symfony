<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Editorial;
use App\Entity\Libro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $libro = new Libro();
        $edit = new Editorial();
         $edit->addNombre($libro);

        $libro->setTitulo('El sol de Breda');
        
        $libro->setEdicion($edit);
        $libro->setEditorial($edit);
        $libro->setISBN('84-204-8312-5');
        $libro->setCategoria('novela');
        $autor->setNombre('Perez-Reverte');
        $libro->setPublicacion('1998');
        $autor->addTipo($libro);
       
        $em->persist($autor);
        $em->persist($libro);
        $em->persist($edit);
        $em->flush();

        dump($autor);

//        $em = new \Doctrine\ORM\EntityManager();

        return $this->render('autor/index.html.twig', [
            'controller_name' => 'AutorController',
        ]);
    }
}
