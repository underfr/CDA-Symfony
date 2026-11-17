<?php

namespace App\Service;
use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;

class BookService
{

    public function __construct(
        private BookRepository $bookRepository
    )
    {
    }

    public function getBooks(): array
    {
        return $this->bookRepository->findAll() ?? [];
    }

    public function getBookById(int $id): Book | null
    {
        return $this->bookRepository->find($id) ?? null;
    }
}
