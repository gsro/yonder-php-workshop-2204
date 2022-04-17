<?php

require_once("repo/RepoInterface.php");
require_once("model/validators/Validator.php");

class BooksRepo implements RepoInterface {
	private array $books;
	private $validator;
	private array $category_counter;

	function __construct(string $validator_class, array $books = null) {
		$category_counter = [];
		if ($books) {
			foreach ($books as $book) {
				if (isset($this->category_counter[$book->getCategory()])) {
					$this->category_counter[$book->getCategory()]++;	
				} else $this->category_counter[$book->getCategory()] = 1;
			}
		}
		$this->books = $books ?? [];
		$this->validator = $validator_class;
	}

	public function save(Book $book): void {
		$this->validator::validate($book);
		if (isset($this->category_counter[$book->getCategory()])) {
			if ($this->category_counter[$book->getCategory()] > 10)
				throw new RuntimeException("Can't have more than 10 of " . $book->getCategory());
			
			$this->category_counter[$book->getCategory()]++;
		} else {
			$this->category_counter[$book->getCategory()] = 1;
		}

		array_push($this->books, $book);
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
	
	function update(int $id, Book $book): void {
	}
	
	function delete(int $id): void {
	}
}