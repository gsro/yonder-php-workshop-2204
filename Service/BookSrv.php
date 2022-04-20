<?php

require_once ('Domain/Model/ScienceFictionBook.php');
require_once ('Domain/Model/MusicBook.php');
require_once ('Domain/Model/HistoryBook.php');
require_once ('Repository/RepoInterface.php');
require_once ('Domain/Model/AbstractBook.php');


class BookSrv
{
    private IRepository $repo;
    public function __construct(IRepository $repo)    {$this->repo = $repo;}

    public function addScienceFictionBook(int $id,string $name,int $price,string $category):void
    {
        $book = new ScienceFictionBook($id,$name,$price,$category);
        try {
            $this->repo->add($book);

        } catch (Exception) {
            throw new InvalidArgumentException("The maximum number of books should be < 10/category");
        }
    }
    public function addMusicBook(int $id,string $name,int $price,string $category):void
    {
        $book = new MusicBook($id,$name,$price,$category);
        try {
            $this->repo->add($book);

        } catch (Exception) {
            throw new InvalidArgumentException("The maximum number of books should be < 10/category");
        }
    }
    public function addHistoryBook(int $id,string $name,int $price,string $category):void
    {
        $book = new HistoryBook($id,$name,$price,$category);
        try {
            $this->repo->add($book);

        } catch (Exception) {
            throw new InvalidArgumentException("The maximum number of books should be < 10/category");
        }
    }
    public function deleteBook(int $id):void
    {

        try {
            $this->repo->delete($id);

        } catch (Exception) {
            throw new InvalidArgumentException("The book is stolen");
        }
    }
    public function updateBook(int $id,string $name,int $price,string $category):void
    {
        try {
            $book = $this->repo->find($id);

        } catch (Exception) {
            throw new InvalidArgumentException("The book is stolen");
        }

        $book->setName($name);
        $book->setPrice($price);
        $book->setCategory($category);
    }
    public function getAll() : array
    {
        $books = $this->repo->getAll();
        usort($books, fn (AbstractBook $firstBook, AbstractBook $secondBook) => $firstBook->getName() <=> $secondBook->getName());

        return $books;
    }

    public function content():void
    {
        $this->addScienceFictionBook(1,"The Island",50,"SF");
        $this->addMusicBook(2,"THIS IS IT",60,"Pop");
        $this->addMusicBook(3,"Crying",40,"Rock");
        $this->addHistoryBook(4,"WW1",15,"War");
        $this->addHistoryBook(5,"WW1",15,"War");
        $this->addHistoryBook(6,"WW1",15,"War");
        $this->addHistoryBook(7,"WW1",15,"War");
        $this->addHistoryBook(8,"WW1",15,"War");
        $this->addHistoryBook(9,"WW1",15,"War");
        $this->addHistoryBook(10,"WW1",15,"War");
        $this->addHistoryBook(11,"WW1",15,"War");
        $this->addHistoryBook(12,"WW1",15,"War");
        $this->addHistoryBook(13,"WW1",15,"War");


    }
}
