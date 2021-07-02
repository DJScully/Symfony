<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Editorial;
use App\Entity\Fondo;
use App\FakeData\Catalogo;
use App\Repository\AutorRepository;
use App\Repository\EditorialRepository;
use App\Repository\FondoRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;

class CatalogoController extends AbstractController
{

    #[Route('/catalogo', name: 'catalogo-total')]
    public function index(FondoRepository $fondoRepository, Request $request): Response
    {
       
//$pagina = $request->query->get('pagina', 1);  $_GET['pagina']
        $pagina = $request->request->get('pagina', 1); // $_POST['pagina']
        $fondos = $fondoRepository->findAll();
        dump($pagina);
       // $fondos = Catalogo::$fondos;
        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos]);
    }

    
    #[Route('/catalogo/libros', name: 'catalogo')]
    public function libro(FondoRepository $fondoRepository): Response
    {
        $fondos = $fondoRepository->findAll();
        
       // $fondos = Catalogo::$fondos;
        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos]);
    }

    #[Route('/ver/{id}', name: 'catalogo-ver')]
    public function ver($id,FondoRepository $fondoRepository){
       
       

        $fondo = $fondoRepository->find($id);

        return $this->render('catalogo/ver.html.twig',[
           'fondo' => $fondo
        ]);
    }

    #[Route('/crear-con-editorial', name: 'catalogo_crear-con-editorial')]
    public function cce(
        FondoRepository $fondoRepository,
        EntityManagerInterface $em
        ): Response
    {
        $autorId = new Autor();
        $autorId->setTipo('Persona');
        $autorId->setNombre('Edgar Allan Poe');

        $editorialId = new Editorial();
        $editorialId->setNombre('The Saturday Evening Post');


        $titulo = 'El Gato Negro';
        $isbn = '84-666-6583-5';
        $edicion = 2010;
        $publicacion = 2010;
        $categoria = 'Ficción';
       
        $em->persist(($editorialId));
        $em->persist($autorId);


        $fondo = new Fondo();
        $fondo->setTitulo($titulo);
        $fondo->setIsbn($isbn);
        $fondo->setEdicion($edicion);
        $fondo->setPublicacion($publicacion);
        $fondo->setCategoria($categoria);
        $fondo->setEditorial($editorialId);
        $fondo->addAutor($autorId);
       

        $em->persist($fondo);
        $em->flush();

        $fondos = $fondoRepository->findAll();

       
        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos
        ]);
    }

    #[Route('catalogo/modificar', name: 'catalogo_modificar')]
    public function modificar(
        FondoRepository $fondoRepository,
        EntityManagerInterface $em
        ): Response
    {
        $id = 4;
        $publicacion = 2006;
        $aut = new Autor();

        $aut->setNombre('Dmitri Glujovski');
        $aut->setTipo('Persona');

        $edit = new Editorial();

        $edit->setNombre('Timunmas');
        
        
        $fondo = $fondoRepository->find($id);
        $fondo->setPublicacion($publicacion);
        $fondo->setTitulo("Metro 2033");
        $fondo->addAutor($aut);
        $fondo->setEditorial($edit);
        $em->persist($edit);
        $em->persist($aut);
        $em->persist($fondo);
        $em->flush();

        $fondos = $fondoRepository->findAll();

        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos
        ]);
    }

}
