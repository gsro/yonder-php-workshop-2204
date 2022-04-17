<?php

require_once("./model/validators/Validator.php");
class BookValidator extends Validator {
	static function validate(Book $book): void {
        if (strlen($book->getName()) > 10) throw new RuntimeException('Title length should be < 10 characters');
        if (strlen($book->getCategory()) > 10) throw new RuntimeException('Category name should be < 10 characters');
        if ($book->getPrice() < 0) throw new RuntimeException('Price should be positive');
	}
}