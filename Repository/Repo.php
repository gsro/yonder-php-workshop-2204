<?php
require_once ('Domain/Model/AbstractBook.php');
require_once ('Domain/Validator/Validate.php');
require_once ('Repository/RepoInterface.php');

class Repo implements IRepository
{
    private array $books;

    public function __construct()
    {
        $this->books = [];
    }
    public function find(int $id): AbstractBook
    {

        if (!isset($this->bookList[$id]))
            throw new InvalidArgumentException("The book is stolen");
        return $this->books[$id];
    }

    public function add(AbstractBook $book): void
    {
        Validate::validate($book);

        $nr = 0;
        foreach ($this->books as $currentBook)
            if(strcmp($currentBook->getCategory(),$book->getCategory()) == 0)
                $nr++;
        if($nr>=10)
            throw new InvalidArgumentException("The maximum number of books should be < 10/category");

        if(isset($this->bookList[$book->getId()])){
            throw new InvalidArgumentException("The book is used.");
        }

        $this->books[$book->getId()] = $book;
    }

    public function update(int $id, AbstractBook $book): void
    {
        Validate::validate($book);
        $this->books[$book->getId()] = $book;
    }

    public function delete(int $id): void
    {
        if (!isset($this->bookList[$id]))
            throw new InvalidArgumentException("The book is stolen, can't be removed");
        unset($this->books[$id]);
    }

    public function getAll(): array
    {
        return $this->books;
    }

}