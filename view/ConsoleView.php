<?php
declare(strict_types=1);
include_once('model/book/BookAbstract.php');
class ConsoleView
{
    private BookController $controller;

    public function __construct(BookController $controller)
    {
        $this->controller = $controller;
    }

    public function displayMenu(): void
    {
        echo "\n1. Add a book\n";
        echo "2. Delete a book\n";
        echo "3. Update a book\n";
        echo "4. List all books alphabetically\n";
        echo "5. Exit\n";
    }

    public function displayAddMenu(): void
    {
        echo "1. Add a SF book\n";
        echo "2. Add a history book\n";
        echo "3. Add a music book\n";
        echo "4. Back\n";
    }

    public function addBookFlow(): void
    {
        $this->displayAddMenu();
        $input = readline("\nSelect an option: ");
        switch ($input) {
            case 1:
                $this->addSfBook();
                break;
            case 2:
                $this->addHistoryBook();
                break;
            case 3:
                $this->addMusicBook();
                break;
            case 4:
                $this->displayMenu();
                break;
            default:
                echo "Invalid input\n";
                $this->addBookFlow();
        }
    }

    public function addSfBook(): void
    {
        $id = readline("Enter id of the sf book: ");
        if (!is_numeric($id)) {
            echo "Id must be a number\n";
            return;
        }
        $id = (int)$id;
        $title = readline("Enter name of the sf book: ");
        $price = readline("Enter price of the sf book: ");
        if (!is_numeric($price)) {
            echo "Price must be a number\n";
            return;
        }
        $price = (int)$price;
        $category = readline("Enter category of the sf book: ");
        $this->controller->addSfBook($id, $title, $price, $category);

    }

    public function addHistoryBook()
    {
        $id = readline("Enter id of the history book: ");
        if (!is_numeric($id)) {
            echo "Id must be a number\n";
            return;
        }
        $id = (int)$id;
        $title = readline("Enter name of the history book: ");
        $price = readline("Enter price of the history book: ");
        if (!is_numeric($price)) {
            echo "Price must be a number\n";
            return;
        }
        $price = (int)$price;
        $category = readline("Enter category of the history book: ");
        $this->controller->addHistoryBook($id, $title, $price, $category);
    }

    public function addMusicBook(): void
    {
        $id = readline("Enter id of the musical book: ");
        if (!is_numeric($id)) {
            echo "Id must be a number\n";
            return;
        }
        $id = (int)$id;
        $title = readline("Enter name of the musical book: ");
        $price = readline("Enter price of the musical book: ");
        if (!is_numeric($price)) {
            echo "Price must be a number\n";
            return;
        }
        $price = (int)$price;
        $category = readline("Enter category of the musical book: ");
        $this->controller->addMusicBook($id, $title, $price, $category);
    }

    public function deleteBook(): void
    {
        $id = readline("Enter id of the book: ");
        if (!is_numeric($id)) {
            echo "Id must be a number\n";
            return;
        }
        $id = (int)$id;
        $this->controller->deleteBook($id);
    }

    public function updateBook(): void
    {
        $id = readline("Enter id of the book: ");
        if (!is_numeric($id)) {
            echo "Id must be a number\n";
            return;
        }
        $id = (int)$id;
        $title = readline("Enter name of the book: ");
        $price = readline("Enter price of the book: ");
        if (!is_numeric($price)) {
            echo "Price must be a number\n";
            return;
        }
        $price = (int)$price;
        $category = readline("Enter category of the book: ");
        $this->controller->updateBook($id, $title, $price, $category);
    }

    public function displayAlphabetical(): void
    {

        foreach ($this->controller->getAlphabetical() as $book) {
            echo $book."\n";
        }
    }

    public function run(): void
    {
        $this->displayMenu();
        $input = readline("Enter your choice: ");
        if (!is_numeric($input)) {
            echo "Invalid input\n";
            return;
        }
        $input = (int)$input;
        switch ($input) {
            case 1:
                $this->addBookFlow();
                break;
            case 2:
                $this->deleteBook();
                break;
            case 3:
                $this->updateBook();
                break;
            case 4:
                $this->displayAlphabetical();
                break;
            case 5:
                exit(0);
            default:
                echo "Invalid input\n";
                break;
        }
    }

}