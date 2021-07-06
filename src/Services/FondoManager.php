<?php 


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

?>