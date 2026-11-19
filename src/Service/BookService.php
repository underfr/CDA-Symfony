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

    public function getBookByTitle(string $title): array
    {
        return $this->bookRepository->findByTitle($title);
    }

    public function getBookByDate(string $date): array
    {
        return $this->bookRepository->findPublishedAfter(new \DateTimeImmutable($date));
    }
}
