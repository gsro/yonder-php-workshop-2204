<?php

require_once("./repo/BooksRepo.php");
require_once("./model/books/HistoryBook.php");
require_once("./model/validators/BookValidator.php");
$repo = new BooksRepo(BookValidator::class);



foreach (range(0, 9) as $i) {
    $book = new HistoryBook($i, "titlu", 2, "categorie");
    $repo->save($book);
}

// var_dump($repo);

$repo2 = new BooksRepo(BookValidator::class, $repo->all());
var_dump($repo2);