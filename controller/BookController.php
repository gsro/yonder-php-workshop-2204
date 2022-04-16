<?php
declare(strict_types=1);

include('model/book/HistoryBook.php');
include('model/book/MusicBook.php');
include('model/book/SfBook.php');
class BookController
{
    private RepositoryInterface $repo;
    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    public function addSfBook(int $_id,string $_name,int $_price,string $_category):void
    {
        $book = new SfBook($_id,$_name,$_price,$_category);
        $this->repo->save($book);
    }
    public function addMusicBook(int $_id,string $_name,int $_price,string $_category):void
    {
        $book = new MusicBook($_id,$_name,$_price,$_category);
        $this->repo->save($book);
    }
    public function addHistoryBook(int $_id,string $_name,int $_price,string $_category):void
    {
        $book = new HistoryBook($_id,$_name,$_price,$_category);
        $this->repo->save($book);
    }
    public function deleteBook(int $_id):void
    {
        $this->repo->delete($_id);
    }
    public function updateBook(int $_id,string $_name,int $_price,string $_category):void
    {
        $book = $this->repo->getOne($_id);
        $book->setName($_name);
        $book->setPrice($_price);
        $book->setCategory($_category);
    }
    public function getAlphabetical():array
    {
        $books = $this->repo->getAll();
        usort($books,function($a,$b){
            return strcmp($a->getName(),$b->getName());
        });
        return $books;
    }

    public function populate():void
    {
        $this->addSfBook(1,"Lord Rings",20,"Fantasy");
        $this->addSfBook(2,"The Hobbit",15,"Fantasy");
        $this->addMusicBook(3,"The Beatle",10,"Pop");
        $this->addMusicBook(4,"The Roll",12,"Rock");
        $this->addHistoryBook(5,"The Da Vi",15,"Thriller");
        $this->addHistoryBook(6,"The Godfa",20,"Crime");
        $this->addHistoryBook(7,"The Godfa",20,"Crime");
        $this->addHistoryBook(8,"The Godfa",20,"Crime");
        $this->addHistoryBook(9,"The Godfa",20,"Crime");
        $this->addHistoryBook(10,"The Godfa",20,"Crime");
        $this->addHistoryBook(11,"The Godfa",20,"Crime");
        $this->addHistoryBook(12,"The Godfa",20,"Crime");
        $this->addHistoryBook(13,"The Godfa",20,"Crime");
        $this->addHistoryBook(14,"The Godfa",20,"Crime");
        $this->addHistoryBook(15,"The Godfa",20,"Crime");

    }

}