<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController
{
    #[Route('/livres', name: 'app_books')]
    public function index(): Response
    {
        $books = [
            ['id' => 1, 'title' => 'Dune', 'author' => 'Frank Herbert'],
            ['id' => 2, 'title' => '1984', 'author' => 'George Orwell'],
            ['id' => 3, 'title' => 'Fondation', 'author' => 'Isaac Asimov'],
        ];

        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $books,
        ]);
    }
}
