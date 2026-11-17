<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\BookService;

final class BookController extends AbstractController
{
    public function __construct(private BookService $bookService){

    }

    #[Route('/books', name: 'app_books')]
    public function showAllBooks(): Response
    {
        $books = $this->bookService->getBooks();
        return $this->render('book/show_all_book.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route(path:'/books/{id}', name: 'app_book_show')]
    public function showBookById(int $id): Response
    {
        $book = $this->bookService->getBookById($id);
        return $this->render('book/show.html.twig', [
            'book' => $book,
        ]);
    }

}
