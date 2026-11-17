<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController
{
    private $books = [
    ['id' => 1, 'title' => 'Dune', 'author' => 'Frank Herbert'],
    ['id' => 2, 'title' => '1984', 'author' => 'George Orwell'],
    ['id' => 3, 'title' => 'Fondation', 'author' => 'Isaac Asimov'],
    ];
    #[Route('/livres', name: 'app_books')]
    public function index(): Response
    {


        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $this->books,
        ]);
    }
    #[Route('/livres/{id}',
        name: 'app_books_show',
        requirements: ['id' => '\d+']
    )]
    public function show(int $id): Response
    {
        if ($book = $this->books[$id] ?? null) {
            $book = $this->books[$id-1];
            return $this->render('book/show.html.twig', [
                'book' => $book
            ]);
        }
    }


}
