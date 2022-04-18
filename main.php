<?php

include_once ("repository/IRepository.php");
include_once ("repository/BookRepository.php");
include_once ("services/Services.php");
include_once ("ui/UserInterface.php");

function main()
{
    $repo = new BookRepository();
    $services = new Services($repo);
    $ui = new UserInterface($services);

    $ui->example();
    $ui->run();
}

main();