<?php

require_once("repo/RepoInterface.php");
require_once("model/validators/Validator.php");

class BooksRepo implements RepoInterface {
	private array $books;
	private $validator;

	function __construct(string $validator_class) {
		$this->books = [];
		$this->validator = $validator_class;
	}

	public function save(Book $new_book): void {
		$this->validator::validate($new_book);

		foreach ($this->books as $book) {
			if ($book->getId() == $new_book->getId()) 
				throw new RuntimeException('Book already exists');
		}

		array_push($this->books, $new_book);
	}
	
	function all(): array {
		return $this->books;
	}
	
	function find(int $id): Book {
		foreach ($this->books as $book) {
			if ($book->getId() == $id) return $book;
		}
		throw new RuntimeException("Book not found");
	}
	
	function update(Book $new_book): Book {
		$this->validator::validate($new_book);
		
		foreach ($this->books as $book) {
			if ($book->getId() == $new_book->getId()) {
				$old_book = new Book($book->getId(), $book->getName(), $book->getPrice(), $book->getCategory());

				$book->setCategory($new_book->getCategory());
				$book->setPrice($new_book->getPrice());
				$book->setName($new_book->getName());
				return $old_book;
			}
		}
		throw new RuntimeException("Book not found");
	}
	
	function delete(int $id): Book {
		$index = 0;
		foreach ($this->books as $book) {
			if ($book->getId() == $id) {
				unset($this->books[$index]);
				return $book;
			}
			$index++;
		}
		throw new RuntimeException("Book not found");	
	}
}