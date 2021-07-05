<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Editorial;
use App\Entity\Fondo;
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

    #[Route('/catalogo/new', name: 'catalogo-new')]
    public function new(): Response{
        return $this->render('catalogo/new.html.twig');
    }

    #[Route('/catalogo/ver/{id}', name: 'catalogo-ver')]
    public function ver($id,FondoRepository $fondoRepository){
       
       

        $fondo = $fondoRepository->find($id);

        return $this->render('catalogo/ver.html.twig',[
           'fondo' => $fondo
        ]);
    }

    #[Route('/catalogo/crear-con-editorial', name: 'catalogo_crear')]
    public function crear(
        Request $request,
        EntityManagerInterface $em
        ): Response
    {

        $titulo= $request->request->get('titulo');
        $isbn= $request->request->get('isbn');
        $edicion= $request->request->get('edicion');
        $publicacion= $request->request->get('publicacion');
        $categoria= $request->request->get('categoria');

        $autor= $request->request->get('autor');
        $tipo= $request->request->get('tipo');
        $editorial= $request->request->get('edit');



        $autorId = new Autor();
        $autorId->setTipo($tipo);
        $autorId->setNombre($autor);

        $editorialId = new Editorial();
        $editorialId->setNombre( $editorial);

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

        return $this->redirectToRoute('catalogo');
    }

    #[Route('/catalogo/actualizar/{id}', name: 'catalogo-act')]
    public function actualizar($id,  FondoRepository $fondoRepository,): Response{
        $editorial = $fondoRepository->find($id);
        return $this->render('catalogo/actualizar.html.twig',[
            'fondo' => $editorial]);
   }

    #[Route('catalogo/modificar/{id}', name: 'catalogo_modificar')]
    public function modificar($id,Request $request,
        FondoRepository $fondoRepository,
        EntityManagerInterface $em
        ): Response
    {
        $titulo= $request->request->get('titulo');
        $isbn= $request->request->get('isbn');
        $edicion= $request->request->get('edicion');
        $publicacion= $request->request->get('publicacion');
        $categoria= $request->request->get('categoria');

        $autor= $request->request->get('autor');
        $tipo= $request->request->get('tipo');
        $editorial= $request->request->get('edit');



        $autorId = new Autor();
        $autorId->setTipo($autor);
        $autorId->setNombre($tipo);

        $editorialId = new Editorial();
        $editorialId->setNombre( $editorial);

        $em->persist(($editorialId));
        $em->persist($autorId);
        
        
        $fondo = $fondoRepository->find($id);
        $fondo->setIsbn($isbn);
        $fondo->setEdicion($edicion);
        $fondo->setPublicacion($publicacion);
        $fondo->setCategoria($categoria);
        $fondo->setTitulo($titulo);
        $fondo->addAutor($autorId);
        $fondo->setEditorial($editorialId);
        $em->persist($editorialId);
        $em->persist($autorId);
        $em->persist($fondo);
        $em->flush();

        return $this->redirectToRoute('catalogo');
    }

    #[Route('catalogo/delete/{id}', name: 'catalogo-delete')]
    public function delete($id, FondoRepository $fondoRepository, EntityManagerInterface $em){
        $catalogo = $fondoRepository->find($id);
        $em->remove($catalogo);
        $em->flush();
        return $this->redirectToRoute('catalogo');
    }

}
