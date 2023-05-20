<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/authors", name="authors")
 */

class AuthorController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/index", name="index")
     */
    public function index() : Response {
        return new Response(content: '<h1>AUTHOR CONTROLLER INDEX</h1>');
    }

    /**
     * @Route("/all", name="allAuthors")
     * @param AuthorRepository $authorRepository
     * @return Response
     */
    public function allAuthors(AuthorRepository $authorRepository) : Response {
        $response = new JsonResponse(['authors'=>$authorRepository->findAll()]);
        return $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @Route("/show/{id}", name="showAuthor")
     * @param $id
     * @param AuthorRepository $authorRepository
     * @return Response
     */
    public function exactAuthor($id, AuthorRepository $authorRepository) : Response {
        $response = new JsonResponse(['author'=>$authorRepository->find($id)]);
        return $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @Route("/create", name="createAuthor")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) : Response {
        $author = new Author();

        $author->setFio('testing fio');
        $author->setBkCounter('20');

        $em = $this->doctrine->getManager();
        $em->persist($author);
        $em->flush();

        return new Response(content: '<h1>Author has been created!</h1>');
    }

}