<?php
include_once('BookValidator.php');
include_once('Book.php');
include_once('SFbooks.php');
include_once('MusicalBook.php');
include_once ('HistoryBook.php');
include_once('BookRepositoryClass.php');
$a = (int) readline('Enter an integer: ');
$bookValidator = new BookValidator();
$bookRepository = new BookRepositoryClass();

function Display($id, BookRepositoryClass $bookRepository) {
    $book = $bookRepository->GetOne($id);

    echo $book->getName();
    echo $book->getPrice();
    echo $book->getCategory();
    echo $book->getId();
}

for ($i = 0; $i<=$a; $i++){
    $id = (int) readLine('Enter the id of the book: ');
    $name = readLine('Enter the name of the book: ');
    $price =(int) readLine('Enter the price of the book: ');
    $category = readLine('Enter the category of the book: ');
    $book = new Book($id, $price, $name, $category);
    try{
        $bookValidator->validate($book);
        $bookRepository->AddOne($book);
    }
    catch (Exception $e)
    {
        echo 'Message: '.$e->getMessage();
    }
}

$option = (int) readLine('Enter the option: ');
switch($option)
{case 1: {
    $nameToBeDeleted = readLine('The name to be deleted is: ');
    $bookRepository->DeleteOneByName($nameToBeDeleted);
}
    break;
    case 2:{
        $nameToBeEdited = readLine('The name to be edited is: ');
        $newName = readLine('The new name is: ');
        $bookRepository->EditOneBookName($nameToBeEdited,$newName);

    }
    break;
    case 3: {
            foreach($bookRepository->GetAll() as $book){
                Display($book->getId(), $bookRepository);
            }
        }
        break;
    case 4 :
    {
        foreach ($bookRepository->GetAllSortedByName() as $book) {
            Display($book->getId(), $bookRepository);

        }
    }
    break;
    default:
        echo "You didn't select an option!";

}
