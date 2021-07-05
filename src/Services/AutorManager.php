<?php 

namespace App\Services;


use App\Entity\Autor;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class AutorManager{
    private EntityManagerInterface $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function crearAutor(string $nombre, string $tipo){
        $autor = new Autor();
        $autor->setNombre($nombre);
        $autor->setTipo($tipo);
        $this->em->persist($autor);

        try {
            $this->em->flush(); 
        } catch(Exception $e){
            $e->getMessage();
            return ['status' => false];
        }
        

        return  $autor;
        
    }
}


?>