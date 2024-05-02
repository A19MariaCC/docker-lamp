<?php
    namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class TiendaController extends AbstractController {
        #[Route('/TiendaController')]
        public function homepage() {

            $productos = [
                ['descripcion' => 'Anillo Cruz Oro', 'precio' => '100', 'foto' => 'images/anillo.jpg'],
                ['descripcion' =>  'Pulsera Rayo plata', 'precio' => '40', 'foto' => 'images/pulsera.jpg'],
                ['descripcion' =>  'Colgante Oso plata', 'precio' => '20', 'foto' => 'images/colgante.jpg'],
        
            ];
            return $this->render('tienda/homepage.html.twig' , [
                'titulo' => 'Tienda DWCS',
                'productos' => $productos,
            ]);
        }

        #[Route('/ejercicios/lista/{slug}')]
        public function listar(String $slug=null){
            if($slug){
                return new Response("Página futura para listar ".$slug);
            }else{
                return new Response("Página futura para listar todo");
            }
            
        }
    
    }



?>