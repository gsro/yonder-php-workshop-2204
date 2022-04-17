<?php

require_once("./repo/BooksRepo.php");
require_once("./ctrl/BooksController.php");
require_once("./model/validators/BookValidator.php");
require_once("./view/Console.php");

foreach (glob("model/books/*.php") as $filename)
{
    require_once($filename);
}

$repo = new BooksRepo(BookValidator::class);
$ctrl = new BooksController($repo);

$ui = new Console($ctrl);
$ui->run();