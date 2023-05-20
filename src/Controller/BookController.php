<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/books", name="books")
 */

class BookController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/index", name="index")
     */
    public function index() : Response {
        return new Response(content: '<h1>BOOK CONTROLLER INDEX</h1>');
    }


    /**
     * @Route("/all", name="allBooks")
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function allBooks(BookRepository $bookRepository) : Response
    {
        $response = new JsonResponse(['books'=>$bookRepository->findAll()]);
        return $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @Route("/show/{id}", name="showBook")
     * @param $id
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function exactBook($id, BookRepository $bookRepository): Response
    {
        $response = new JsonResponse(['book'=>$bookRepository->find($id)]);
        return $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @Route("/create", name="createBook")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $book = new Book();

        $date = new DateTime('2007-12-12 00:00:00');

        $book->setTitle('testing book');
        $book->setDateOfCreation($date);
        $book->setDescription('water');

        $em = $this->doctrine->getManager();
        $em->persist($book);
        $em->flush();

        return new Response(content: '<h1>Book has been created!</h1>');
    }

}