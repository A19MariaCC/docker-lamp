<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class TiendaFloresController extends AbstractController {
        #[Route('/', name: 'app_homepageTiendaFlores')]
        public function homepageTiendaFlores() {

            $plantas = [
                ['descripcion' => 'Flores', 'imagen' => 'images/plantas/Orquidea.jpeg', 'enlace' => 'listarPlantas/orquideas'],
                ['descripcion' =>  'Plantas de interior', 'imagen' => 'images/plantas/DracaenaLimaLimon.jpeg', 'enlace' => 'listarPlantas/plantasInterior'],
                ['descripcion' =>  'Plantas de exterior','imagen' => 'images/plantas/begonia.jpeg', 'enlace' => 'listarPlantas/plantasExterior'],
                ['descripcion' =>  'Ramos de flores','imagen' => 'images/plantas/ramoRosasAmarillas.jpeg', 'enlace' => 'listarPlantas/ramos'],
        
            ];
            return $this->render('tienda/homePageTiendaFlores.html.twig' , [
                'titulo' => 'Tienda de Flores',
                'plantas' => $plantas,
            ]);
        }

        #[Route('/listarPlantas/{slug}')]
        public function listarPlantas(String $slug=null){
            $orquideas = [
                ['descripcion' => 'Orquídea Blanca', 'precio' => '20 €', 'imagen' => '../images/plantas/orquideaBlanca.jpg'],
                ['descripcion' => 'Orquídea Rosa', 'precio' => '22 €', 'imagen' => '../images/plantas/orquideaRosa.jpg'],
            ];
            $plantasInterior = [
                ['descripcion' => 'Calatea', 'precio' => '30 €', 'imagen' => '../images/plantas/calatea.jpg'],
                ['descripcion' => 'Lengua de suegra', 'precio' => '25 €', 'imagen' => '../images/plantas/lenguaSuegra.jpg'],

            ];
            $plantasExterior = [
                ['descripcion' => 'Begonia', 'precio' => '20 €', 'imagen' => '../images/plantas/begonia.jpg'],
                ['descripcion' => 'Alegría de casa', 'precio' => '18 €', 'imagen' => '../images/plantas/alegria.jpg'],

            ];
            $ramos = [
                ['descripcion' => 'Ramo de rosas', 'precio' => '30 €', 'imagen' => '../images/plantas/rosas.jpg'],
            ];

            if($slug == "orquideas"){
                $titulo = 'Listado de orquídeas';
                $info = $orquideas;
            }elseif($slug == "plantasInterior"){
                $titulo = 'Listado de plantas de interior';
                $info = $plantasInterior;
            }elseif($slug == "plantasExterior"){
                $titulo = 'Listado de plantas de exterior';
                $info = $plantasExterior;
            }elseif($slug == "ramos"){
                $titulo = 'Listado de ramos de flores';
                $info = $ramos;
            }else{
                return new Response("Página no encontrada");
            }
            
            return $this->render('tienda/listarPlantas.html.twig' , [
                'titulo' => $titulo,
                'informacion' => $info,
            ]);
        }

        #[Route('/listaTiendas/{slug}', name: 'app_listadoTiendasFlores')]
        public function listaTiendas(String $slug = null) {

            $floristerias = [
                ['nombre' => 'Flores Carmina', 'direccion' => 'Calle Carrera del Conde num 15'],
                ['nombre' => 'Flores Rosa', 'direccion' => 'Rúa de San Pedro num 40'],
        
            ];
            return $this->render('tienda/listaTiendas.html.twig' , [
                'floristerias' => $floristerias,
            ]);
        }
    
    }

?>