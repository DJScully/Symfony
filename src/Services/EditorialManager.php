<?php 


namespace App\Services;


use App\Entity\Editorial;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class EditorialManager{
    private EntityManagerInterface $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    } 

    public function crearEditorial(string $nombre){
        $editorial = new Editorial();
        $editorial->setNombre($nombre);
        $this->em->persist($editorial);
        
        
        try {
            $this->em->flush(); 
        } catch(Exception $e){
            $e->getMessage();
            return ['status' => false];
        }

        return $editorial;
    }
}

?>