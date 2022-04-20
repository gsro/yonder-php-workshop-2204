<?php
require_once ('Repository/RepoInterface.php');
require_once ('Repository/Repo.php');
require_once ('Service/BookSrv.php');
require_once ('UI/UI.php');


$repo = new Repo();
$ctrl = new BookSrv($repo);
$ctrl->content();
$ui = new UI($ctrl);

while (true)
{
$ui->run();
}