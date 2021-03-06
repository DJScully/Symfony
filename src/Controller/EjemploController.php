<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EjemploController extends AbstractController
{
    /**
     * @Route("/hola", name="hola")
     */
    public function saludo(){
        $name = 'Jordan';
        return new Response('<html><body><h1>Hola ' . $name . ', ¿Ha conseguido poner en funcionamiento
        le ejercicio propuesto en clase!</h1></body><html>');
    }

    /**
     * @Route("/adios", name="adios")
     */

    public function despedida(){
        $name = 'Jordan';
        return new Response('<html><body><h1>Felicidades ' . $name . ', !Ha conseguido poner en funcionamiento
        le ejercicio propuesto en clase!</h1></body><html>');
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){
        $name = 'Jordan';
        return new Response('<html><body><h1>Bienvenido ' . $name . '</h1>, <h2>gracias por usar nuestro framework para el desarrollo de sus
        futuros proyectos</h2></body><html>');
    }

 
     /**
     * @Route("/about_us", name="about_us")
     */

    public function about_us(){
       
        return new Response('<html><body><h1>Symfony</h1> <h3>Es un framework diseñado para desarrollar aplicaciones web basado en el patrón Modelo Vista Controlador.
         Para empezar, separa la lógica de negocio, la lógica de servidor y la presentación de la aplicación web.</h3></body><html>');
    }

/**
     * @Route("/response1", name="response1")
     */
    public function response1(): Response
    {

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
        ],
      ];

      $personasEncodedToJson = json_encode($personas);
      // dump($personasEncodedToJson);

      $response = new Response(
        $personasEncodedToJson,
        Response::HTTP_OK,
        array('content-type' => ' application/json')
      );

      // $response = new Response();
      // $response->setContent('Otro contenido');
      // $response->setStatusCode(404);
    
      return $response;
    }



}


?>