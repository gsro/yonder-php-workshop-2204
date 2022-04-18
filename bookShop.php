<?php

declare(strict_types = 1);

use App\Controllers\BookController;
use App\Services\BookService;

spl_autoload_register(function (string $className): void {
    [, $directory, $class] = explode('\\', $className, 3);
    $classPath = __DIR__ . "/$directory/$class.php";

    if (file_exists($classPath)) {
        require_once($classPath);
    }
});

// call any controller methods
$bookController = new BookController(new BookService());
