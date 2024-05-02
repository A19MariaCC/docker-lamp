<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    class PrimerController {
        #[Route('/Ejemplo')]
        public function homepage() {
            return new Response("Primera página con Symfony en DWCS");
        }

        #[Route('/listar/{slug}')]
        public function listar(String $slug=null){
            if($slug){
                return new Response("Página futura para listar ".$slug);
            }else{
                return new Response("Página futura para listar todo");
            }
            
        }
    
    }



?>