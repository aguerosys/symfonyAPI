<?php 

    namespace App\Controller\Api;

    use App\Repository\BookRepository;
    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;
    use Symfony\Component\HttpFoundation\Request;

    class BooksController extends AbstractFOSRestController{

        
        /**
            * @Rest\Get(path="api/books")
            * @Rest\View(serializerGroups={"book"}, serializerEnableMaxDepthChecks=true)
        */

        public function getActions(BookRepository $bookRepository)
        {
            return $bookRepository->findAll();
        }
    }


?>