<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{
   
/*$personas = [
  [
    'name' => 'Carlos',
    'age' => 21
  ],
  [
    'name' => 'Carmen',
    'age' => 16
  ],
  [
    'name' => 'Carla',
    'age' => 32
  ],
  [
    'name' => 'Carlota',
    'age' => 17
  ],
];
*/
   


    /**
     * @Route("/saludar", name="saludar")
     */
    public function saluda(){
        $name = 'Jordan';
       return $this->render('ejemplo/saludar.html.twig'
       ,['nombre'=>$name,'age'=>23]);
    }

    /**
     * @Route("/adios", name="adios")
     */

    public function despedida(){
        $name = 'Jordan';
       return $this->render('ejemplo/despedida.html.twig'
       ,['nombre'=>$name,'age'=>23]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(){
        $name = 'Jordan';
       return $this->render('ejemplo/home.html.twig'
       ,['nombre'=>$name]);
    }

    /**
     * @Route("/login", name="login")
     */

    public function login(){
        
        $name = 'Jordan';
       return $this->render('ejemplo/login.html.twig'
       ,['nombre'=>$name,'cod'=>"*******"]);
    }

     /**
     * @Route("/about_us", name="about_us")
     */

    public function about_us(){
       
        $name = 'Symfony';
       return $this->render('ejemplo/about.html.twig'
       ,['nombre'=>$name]);
    }

    /**
     * @Route("/tabla", name="tabla")
     */

    public function tabla(){
        $personas = [
            [
              'name' => 'Carlos',
              'age' => 21
            ],
            [
              'name' => 'Carmen',
              'age' => 16
            ],
            [
              'name' => 'Carla',
              'age' => 32
            ],
            [
              'name' => 'Carlota',
              'age' => 17
            ]];

            return $this->render('ejemplo/tabla.html.twig'
            ,['personas'=>$personas]);
    }

}


?>