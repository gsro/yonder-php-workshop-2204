<?php
include_once('Book.php');
include_once('BookRepository.php');
class BookRepositoryClass implements BookRepository
{
 private $books;
 public function __construct(){
     $books = array();
 }
 public function AddOne(Book $book)
 {
     $this->books[$book->getId()] = $book;
 }

 private function FindOneByName(string $name): int {
     foreach ( $this->books as $element ) {
         if ( $name == $element->name ) {
             return $element->id;
         }
     }
     throw new Exception("Unable to find book");
 }

    public function DeleteOneByName(string $name): void
    {
        $key = $this->FindOneByName($name);
        if ($key !== false) {
            unset($this->books[$key]);
        }
    }

    public function GetOne(int $id): Book
    {
        return $this->books[$id];
    }

    public function EditOneBookName($name,$newName): void
    {  $key = $this->FindOneByName($name);
        $this->books[$key]->name = $this->books->setName($newName);
    }

    public function GetAll(): array
    {
        return $this->books;
    }

    public function GetAllSortedByName(): array
    {
        $booksCopy = $this->books;
        usort($booksCopy, fn($a, $b) => strcmp($a->name, $b->name));
        return $booksCopy;
    }
}