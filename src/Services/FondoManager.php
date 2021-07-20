<?php

namespace App\Services;

use App\Repository\FondoRepository;

class LibrosManager {

 // private $fondoRepository;
  public function __construct(private FondoRepository $fondoRepository) {
    //$this->fondoRepository = $fondoRepository;
  }

  public function getJsonFondos() {
    $fondos = $this->fondoRepository->findAllWithAutoresAndEditoriales();

    $fondosArray = [];
    foreach($fondos as $fondo) {
        $fondoArray = [
            $fondo->getTitulo(),
            $fondo->getIsbn(),
            $fondo->getEdicion(),
            $fondo->getPublicacion(),
            $fondo->getEditorial()->getNombre()
        ];
        $fondosArray[] = $fondoArray;
    }
    return $fondosArray;
  }

  public function arrayToJson($fondos) {

    $fondosArray = [];
    foreach($fondos as $fondo) {
        $fondoArray = [
            $fondo->getTitulo(),
            $fondo->getIsbn(),
            $fondo->getEdicion(),
            $fondo->getPublicacion()
        ];
        $fondosArray[] = $fondoArray;
    }
    return $fondosArray;
  }
}/*<?php 


namespace App\Services;


use App\Entity\Fondo;
use App\Entity\Editorial;
use App\Entity\Autor;
use App\Services\AutorManager;
use App\Services\EditorialManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class FondoManager {
    private EntityManagerInterface $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    } 
    
    public function crearLibro(string $titulo, string $isbn, string $edicion, 
    string $publicacion, string $categoria, Editorial $editorialId, 
    Autor $autorId, string $nombre, string $tipo, string $edit,AutorManager $manager, EditorialManager $editorialManager){


        $autorId = $manager->crearAutor($nombre,$tipo);
        $editorialId = $editorialManager->crearEditorial($edit);
        $fondo = new Fondo();
        $fondo->setTitulo($titulo);
        $fondo->setIsbn($isbn);
        $fondo->setEdicion($edicion);
        $fondo->setPublicacion($publicacion);
        $fondo->setCategoria($categoria);
        $fondo->setEditorial($editorialId);
        $fondo->addAutor($autorId);
       

        try {
            $this->em->flush(); 
        } catch(Exception $e){
            $e->getMessage();
            return ['status' => false];
        }
        

        return  $fondo;
        
    }
}

?>*/