<?php

include_once ("repository/IRepository.php");
include_once ("domain/model/AbstractBook.php");
include_once ("domain/validator/BookValidator.php");

class BookRepository implements IRepository {

    private array $bookList;

    public function __construct()
    {
        $this->bookList = [];
    }

    public function get(int $id): AbstractBook
    {
        if (!isset($this->bookList[$id]))
            throw new InvalidArgumentException("The book doesn't exist");
        return $this->bookList[$id];
    }

    public function getAll(): array
    {
        return $this->bookList;
    }

    public function add(AbstractBook $book): void
    {
        BookValidator::validate($book);

        if($this->checkNoOfBooks($book) == true)
            throw new InvalidArgumentException("The maximum number of books that can added is 10 per category");

        if(isset($this->bookList[$book->getId()])){
            throw new InvalidArgumentException("The book is already stored.");
        }

        $this->bookList[$book->getId()] = $book;
    }

    public function update(int $id, AbstractBook $book): void
    {
        BookValidator::validate($book);
        $this->bookList[$book->getId()] = $book;

    }

    public function delete(int $id): void
    {
        unset($this->bookList[$id]);
    }

    private function checkNoOfBooks(AbstractBook $book) : bool
    {
        $count = 0;
        foreach ($this->bookList as $currentBook)
            if(strcmp($currentBook->getCategory(),$book->getCategory()) == 0)
                $count++;

        return $count >= 10;
    }
}