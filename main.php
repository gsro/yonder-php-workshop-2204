<?php


include_once('repo/BookRepo.php');
include_once('controller/BookController.php');
include_once('view/ConsoleView.php');
include_once('repo/RepositoryInterface.php');
$repo = new BookRepo();
$ctrl = new BookController($repo);
$ctrl->populate();
$view = new ConsoleView($ctrl);

while (true)
    try {
        $view->run();
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
