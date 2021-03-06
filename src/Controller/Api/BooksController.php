<?php 

    namespace App\Controller\Api;

    use App\Repository\BookRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use App\Entity\Book;
use App\Form\Type\BookFormType;

class BooksController extends AbstractFOSRestController{

        
        /**
            * @Rest\Get(path="api/books")
            * @Rest\View(serializerGroups={"book"}, serializerEnableMaxDepthChecks=true)
        */

        public function getActions(BookRepository $bookRepository)
        {
            return $bookRepository->findAll();
        }

        /**
            * @Rest\Post(path="api/books")
            * @Rest\View(serializerGroups={"book"}, serializerEnableMaxDepthChecks=true)
        */

        public function postActions(EntityManagerInterface $em, Request $request )
        {
            $book = new Book();
            $form = $this->createForm(BookFormType::class, $book);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $em->persist($book);
                $em->flush();
                return $book;
            }
            return $form;
        }
    }


?>