<?php

include_once ("repository/IRepository.php");
include_once ("domain/model/AbstractBook.php");
include_once ("domain/model/SfBook.php");
include_once ("domain/model/MusicBook.php");
include_once ("domain/model/HistoryBook.php");


class Services
{
    private IRepository $repository;

    public function __construct(IRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AbstractBook $book) : void
    {
        $this->repository->add($book);
    }

    public function delete(int $id) : void
    {
        $this->repository->delete($id);
    }

    public function update(int $id, AbstractBook $book) : void
    {
        $this->repository->update($id,$book);
    }

    public function get(int $id) : AbstractBook
    {
        return $this->repository->get($id);
    }

    public function getAll() : array
    {
        $bookList = $this->repository->getAll();
        usort($bookList, function ($b1,$b2){
            return strcmp($b1->getName(), $b2->getName());
        });
        return $bookList;
    }

    public function example() : void
    {
        $this->add(new SfBook(1,'aaa',10,'A'));
        $this->add(new SfBook(2,'bbb',18,'A'));
        $this->add(new SfBook(3,'ccc',20,'A'));
        $this->add(new SfBook(4,'ddd',30,'A'));
        $this->add(new SfBook(5,'eee',20,'A'));
        $this->add(new SfBook(6,'fff',50,'A'));
        $this->add(new SfBook(7,'ggg',30,'A'));
        $this->add(new SfBook(8,'hhh',10,'A'));

        $this->add(new MusicBook(555,'do',10,'M'));
        $this->add(new MusicBook(556,'re',60,'M'));
        $this->add(new MusicBook(557,'mi',24,'M'));

        $this->add(new HistoryBook(888,'war',25,'W'));
        $this->add(new HistoryBook(889,'peace',30,'W'));

    }

}