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
     * @Route("/login", name="login")
     */

    public function login(){
        
        return new Response('<html><body><form><label for="id_us">Usuario</label><input type="text" id="id_us"><br><br>
        <label for="id_pass">Contraseña</label><input type="text" id="id_pass">
        </form></body><html>');
    }

     /**
     * @Route("/about_us", name="about_us")
     */

    public function about_us(){
       
        return new Response('<html><body><h1>Symfony</h1> <h3>Es un framework diseñado para desarrollar aplicaciones web basado en el patrón Modelo Vista Controlador.
         Para empezar, separa la lógica de negocio, la lógica de servidor y la presentación de la aplicación web.</h3></body><html>');
    }


}


?>