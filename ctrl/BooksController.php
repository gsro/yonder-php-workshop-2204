<?php

require_once("./model/books/SFBook.php");
require_once("./model/books/HistoryBook.php");
require_once("./model/books/MusicalBook.php");

class BooksController {

    private BooksRepo $repo;
    private array $category_counter;


	function __construct(BooksRepo $repo) {
        $this->repo = $repo;
        $this->category_counter = [];

        $this->addBook(1, 'marc', 200, 'cat1', 'sf');
        $this->addBook(2, 'abc', 200, 'cat1', 'musical');
        $this->addBook(3, '123', 200, 'cat1', 'history');
        $this->addBook(4, 'mara', 200, 'cat1', 'sf');
        $this->addBook(5, 'mard', 200, 'cat1', 'sf');
	}

    function addBook(int $id, string $name, int $price, string $category, string $type) {
        $book = $this->constructBook($id, $name, $price, $category, $type);
        $this->repo->save($book);
        if (isset($this->category_counter[$book->getCategory()])) {
			if ($this->category_counter[$book->getCategory()] >= 10)
				throw new RuntimeException("Can't have more than 10 of " . $book->getCategory());
			
			$this->category_counter[$book->getCategory()]++;
		} else {
			$this->category_counter[$book->getCategory()] = 1;
		}
    }

    function updateBook(int $id, string $name, int $price, string $category) {
        $book = new Book($id, $name, $price, $category);
        $old_book = $this->repo->update($book);

        $this->category_counter[$old_book->getCategory()]--;

        if (isset($this->category_counter[$book->getCategory()])) {
			if ($this->category_counter[$book->getCategory()] >= 10)
				throw new RuntimeException("Can't have more than 10 of " . $book->getCategory());
			
			$this->category_counter[$book->getCategory()]++;
		} else {
			$this->category_counter[$book->getCategory()] = 1;
		}
    }

    function removeBook(int $id) {
        $book = $this->repo->delete($id);
        $this->category_counter[$book->getCategory()]--;
    }

    function list() {
        $books = $this->repo->all();
        usort($books, fn(Book $a, Book $b) => strcmp($a->getName(), $b->getName()));
        return $books;
    }

    private function constructBook(int $id, string $name, int $price, string $category, string $type): Book {
        switch ($type) {
            case 'sf':
                $book = new SFBook($id, $name, $price, $category);
                break;
            case 'history':
                $book = new HistoryBook($id, $name, $price, $category);
                break;
            case 'musical':
                $book = new MusicalBook($id, $name, $price, $category);
                break;
            default:
                throw new RuntimeException('Not a valid book type');
        }
        return $book;
    }
}