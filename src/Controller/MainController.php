<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {

    /**
     * @Route("/main", name="main")
     */

    public function index(): Response
    {
        return new Response(content: '<h1>Welcome to the best fucking lib!</h1>');
    }


}