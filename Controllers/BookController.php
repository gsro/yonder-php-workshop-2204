<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\BookServiceInterface;
use App\Validator\Validator;
use Exception;

class BookController
{
    public function __construct(private BookServiceInterface $bookService)
    {
    }

    /**
     * @throws Exception
     */
    public function createBook(string $name, string $category, int $price): void
    {
        Validator::validateLength($name);
        Validator::validateLength($category);
        Validator::validatePositiveNumber($price);

        $this->bookService->createBook($name, $category, $price);
    }

    /**
     * @throws Exception
     */
    public function updateBook(string $bookId, string $name, string $category, int $price): void
    {
        Validator::validateLength($name);
        Validator::validateLength($category);
        Validator::validatePositiveNumber($price);
        Validator::validateBlank($bookId);

        $this->bookService->updateBook($bookId, $name, $category, $price);
    }

    /**
     * @throws Exception
     */
    public function deleteBook(string $bookId): void
    {
        Validator::validateBlank($bookId);

        $this->bookService->deleteBook($bookId);
    }

    public function getSortedBooks(): array
    {
        return $this->bookService->getSortedBooks();
    }
}
