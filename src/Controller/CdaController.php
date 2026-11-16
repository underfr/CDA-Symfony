<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CdaController extends AbstractController
{
    public function index(): Response
    {
        return new Response("Test");
    }

    #[Route(path: '/cda_anotation/{name}', name: 'app_cda_cda_anotation')]
    public function cdaAnotation(string $name): Response {
        return new Response("Test" . $name);
    }
}
