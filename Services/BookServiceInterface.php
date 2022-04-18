<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\AbstractBook;
use Exception;

interface BookServiceInterface
{
    /**
     * @throws Exception
     */
    public function createBook(string $name, string $category, int $price): AbstractBook;

    /**
     * @throws Exception
     */
    public function updateBook(string $bookId, string $name, string $category, int $price): AbstractBook;

    /**
     * @throws Exception
     */
    public function deleteBook(string $bookId): void;

    public function getSortedBooks(): array;
}
