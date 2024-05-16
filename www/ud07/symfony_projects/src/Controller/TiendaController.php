<?php
    namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\CacheItemInterface;

    class TiendaController extends AbstractController {
        #[Route('/Ejemplo')]
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

        #[Route('listarProductos/{slug}')]
        public function listar(HttpClientInterface $httpCliente, CacheInterface $cache, String $slug=null): Response{
            
                $productos = $cache->get('productos_data', function(CacheItemInterface $cacheItem) use ($httpCliente){
                $cacheItem->expiresAfter(5);
                $response = $httpCliente-> request('GET' ,'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
                return $response->toArray();
            });

            //dd($productos);
                
            return $this -> render('tienda/listar.html.twig', [
                'tipo' => $slug,
                'productos' => $productos,
            ]);
            
        }
    
    }



?>