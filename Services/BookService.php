<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AbstractBook;
use App\Models\HistoryBook;
use App\Models\MusicBook;
use App\Models\SfBook;
use Exception;

class BookService implements BookServiceInterface
{
    private array $books = [];
    private const NO_OF_BOOK_CATEGORY = 10;

    /**
     * @throws Exception
     */
    public function createBook(string $name, string $category, int $price): AbstractBook
    {
        if (count($this->books[$category] ?? []) >= self::NO_OF_BOOK_CATEGORY) {
            throw new Exception('Only 10 categories per book are allowed');
        }

        $bookId = uniqid('', true);
        $book = $this->generateBook($bookId, $name, $category, $price);
        $this->books[$category][$bookId] = $book;

        return $book;
    }

    /**
     * @throws Exception
     */
    public function updateBook(string $bookId, string $name, string $category, int $price): AbstractBook
    {
        if (!isset($this->books[$category][$bookId])) {
            throw new Exception('Book not found');
        }

        $book = $this->generateBook($bookId, $name, $category, $price);
        $this->books[$category][$bookId] = $book;

        return $book;
    }

    /**
     * @throws Exception
     */
    public function deleteBook(string $bookId): void
    {
        $isFound = false;

        foreach ($this->books as $category => $books) {
            if (!isset($books[$bookId])) {
                continue;
            }

            unset($this->books[$category][$bookId]);
            $isFound = true;
            break;
        }

        if (!$isFound) {
            throw new Exception('Book not found');
        }
    }

    public function getSortedBooks(): array
    {
        $books = $this->getFormattedBooks();

        usort(
            $books,
            fn (AbstractBook $firstBook, AbstractBook $secondBook) => $firstBook->getName() <=> $secondBook->getName()
        );

        return $books;
    }

    private function generateBook(string $bookId, string $name, string $category, int $price): AbstractBook
    {
        return match ($category) {
            'sf' => new SfBook($bookId, $name, $category, $price),
            'music' => new MusicBook($bookId, $name, $category, $price),
            'history' => new HistoryBook($bookId, $name, $category, $price)
        };
    }

    private function getFormattedBooks(): array
    {
        $formattedBooks = [];

        foreach ($this->books as $books) {
            foreach ($books as $book) {
                $formattedBooks[] = $book;
            }
        }

        return $formattedBooks;
    }
}
