<?php
include_once('model/validator/BookValidationException.php');
class BookValidator
{
    /**
     * @throws BookValidationException
     */
    public static function validate(BookAbstract $book)
    {
        $errors = '';
        if (strlen($book->getName()) > 10)
            $errors .= 'Name is too long(max 10 characters)\n';
        if (strlen($book->getCategory()) > 10)
            $errors .= 'Category is too long(max 10 characters)\n';
        if ($book->getPrice() < 0)
            $errors .= 'Price is negative\n';
        if ($errors != '')
            throw new BookValidationException($errors);
    }
}