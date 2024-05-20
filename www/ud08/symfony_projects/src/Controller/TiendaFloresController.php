<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Contracts\HttpClient\HttpClientInterface;
    use Symfony\Contracts\Cache\CacheInterface;
    use Symfony\Contracts\Cache\CacheItemInterface;

    class TiendaFloresController extends AbstractController {
        #[Route('/', name: 'app_homepageTiendaFlores')]
        public function homepageTiendaFlores() {

            $plantas = [
                ['descripcion' => 'Flores', 'imagen' => 'images/plantas/Orquidea.jpeg', 'enlace' => 'listarFlores'],
                ['descripcion' =>  'Plantas de interior', 'imagen' => 'images/plantas/DracaenaLimaLimon.jpeg', 'enlace' => 'listarPlantasInterior'],
                ['descripcion' =>  'Plantas de exterior','imagen' => 'images/plantas/begonia.jpeg', 'enlace' => 'listarPlantasExterior'],
                ['descripcion' =>  'Ramos de flores','imagen' => 'images/plantas/ramoRosasAmarillas.jpeg', 'enlace' => 'listarPlantas/ramos'],
        
            ];
            return $this->render('tienda/homePageTiendaFlores.html.twig' , [
                'titulo' => 'Tienda de Flores',
                'plantas' => $plantas,
            ]);
        }
        /*He probado a configurar la caché para esta ruta pero no me funciona, tiene almancenada en chaché la consulta de la unidad anterior en la que hice 
        el ejemplo de los apuntes de Sabela y no consigo que funcione*/
        #[Route('/listarFlores/{slug}')]
        public function listarFlores(HttpClientInterface $httpClient, CacheInterface $cache, String $slug=null): Response{
            $productos = $cache->get('productos_data', function(CacheItemInterface $cacheItem) use($httpClient){
            $cacheItem->expiresAfter(10);
            $respuesta = $httpClient->request('GET','https://raw.githubusercontent.com/A19MariaCC/docker-lamp/main/www/ud08/symfony_projects/public/flores.json');
            return $respuesta->toArray();
            });
            //dd($productos);
            //dd($slug);
            
            return $this->render('tienda/listarFlores.html.twig' , [
                'titulo' => 'Listado de productos',
                'tipo' => $slug,
                'productos' => $productos,
                ]);
                
        }

        

        #[Route('/listarPlantasInterior/{slug}')]
        public function listarPlantasInterior(HttpClientInterface $httpClient, String $slug=null): Response{
            $respuesta = $httpClient->request('GET','https://raw.githubusercontent.com/A19MariaCC/docker-lamp/main/www/ud08/symfony_projects/public/plantasInterior.json');
            $productos = $respuesta->toArray();
            
            return $this->render('tienda/listarPlantasInterior.html.twig' , [
                'titulo' => 'Listado de productos',
                'tipo' => $slug,
                'productos' => $productos,
                ]);
            
            
        }


        #[Route('/listarPlantasExterior/{slug}')]
        public function listarPlantasExterior(HttpClientInterface $httpClient, String $slug=null): Response{
            $respuesta = $httpClient->request('GET','https://raw.githubusercontent.com/A19MariaCC/docker-lamp/main/www/ud08/symfony_projects/public/plantasExterior.json');
            $productos = $respuesta->toArray();
            
            
            return $this->render('tienda/listarPlantasExterior.html.twig' , [
                'titulo' => 'Listado de productos',
                'tipo' => $slug,
                'productos' => $productos,
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