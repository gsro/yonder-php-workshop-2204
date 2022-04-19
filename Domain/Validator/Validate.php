<?php

class Validate
{

    public static function validate(AbstractBook $book){
        $error = "";

        if(strlen($book->getName()) > 10)
            $error .= "The name should be max 10 characters" . PHP_EOL;
        if(strlen($book->getCategory()) > 10)
            $error .= "The name of the category should be max 10 characters" . PHP_EOL;
        if($book->getPrice() < 0)
            $error .= "The book price should be > 0." . PHP_EOL;

        if($error != "")
            throw new InvalidArgumentException($error);
    }
}
