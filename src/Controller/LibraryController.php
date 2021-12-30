<?php 

namespace App\Controller;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController{


    #[Route('/library/list', name: 'library_list')]

    public function list(Request $request, LoggerInterface $logger){

        $title = $request->get('title', 'Alegria');
        $logger->info('List action called 2');
        $response = new JsonResponse();
        $response->setData([
            'success' => true,
            'data' => [
                'id' => 1,
                'title' => 'Hacia rutas salvajes'
            ],
            [
                'id' => 2,
                'title' => 'Clean Code'
            ],
            [
                'id' => 3,
                'title' => $title
            ]


        ]);
        return $response;

    }


}


?>