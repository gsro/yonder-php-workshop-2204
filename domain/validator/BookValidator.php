<?php

class BookValidator {
    public static function validate(AbstractBook $book){
        $errorMessage = "";

        if(strlen($book->getName()) > 10)
            $errorMessage .= "The name of the book should not have more than 10 characters" . PHP_EOL;
        if(strlen($book->getCategory()) > 10)
            $errorMessage .= "The name of the category should not have more than 10 characters" . PHP_EOL;
        if($book->getPrice() < 0)
            $errorMessage .= "The book price should be a positive number." . PHP_EOL;

        if($errorMessage != "")
            throw new InvalidArgumentException($errorMessage);
    }
}