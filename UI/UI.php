<?php
require_once ('Domain/Model/AbstractBook.php');
class UI
{
    private BookSrv $ctrl;

    public function __construct(BookSrv $ctrl)
    {
        $this->ctrl = $ctrl;
    }

    public function MainMenu(): void
    {
        echo "1. Add a book\n";
        echo "2. Delete a book\n";
        echo "3. Update a book\n";
        echo "4. Print all books\n";
        echo "5. Leave\n";
    }

    public function AddMenu(): void
    {
        echo "1. Add a  ScienceFiction book\n";
        echo "2. Add a History book\n";
        echo "3. Add a Music book\n";
        echo "4. <-Back\n";
    }

    public function addBook(): void
    {
        $this->AddMenu();
        $input = readline("\nSelect an option: ");
        switch ($input) {
            case 1:
                $this->addScienceFictionBook();
                break;
            case 2:
                $this->addHistoryBook();
                break;
            case 3:
                $this->addMusicBook();
                break;
            case 4:
                $this->MainMenu();
                break;
            default:
                echo "Invalid input\n";
                $this->AddMenu();
        }
    }

    public function addScienceFictionBook(): void
    {   echo "id:";
        $id = readline("id: ");
        if (!is_numeric($id)) { echo "Id should be a number\n"; return; }
        $id = (int)$id;
        echo "title:";
        $title = readline("name: ");
        echo "price:";
        $price = readline("price: ");
        if (!is_numeric($price)) {echo "Price should be a number\n"; return;}
        $price = (int)$price;
        echo "category:";
        $category = readline("category: ");
        try {
            $this->ctrl->addScienceFictionBook($id, $title, $price, $category);

        } catch (Exception) {
            echo "The maximum number of books should be < 10/category";
        }

    }

    public function addHistoryBook()
    {   echo "id:";
        $id = readline("id: ");
        if (!is_numeric($id)) { echo "Id should be a number\n"; return; }
        $id = (int)$id;
        echo "title:";
        $title = readline("name: ");
        echo "price:";
        $price = readline("price: ");
        if (!is_numeric($price)) {echo "Price should be a number\n"; return;}
        $price = (int)$price;
        echo "category:";
        $category = readline("category: ");
        try {
            $this->ctrl->addHistoryBook($id, $title, $price, $category);

        } catch (Exception) {
            echo "The maximum number of books should be < 10/category";
        }

    }

    public function addMusicBook(): void
    {   echo "id:";
        $id = readline("id: ");
        if (!is_numeric($id)) { echo "Id should be a number\n"; return; }
        $id = (int)$id;
        echo "title:";
        $title = readline("name: ");
        echo "price:";
        $price = readline("price: ");
        if (!is_numeric($price)) {echo "Price should be a number\n"; return;}
        $price = (int)$price;
        echo "category:";
        $category = readline("category: ");
        try {
            $this->ctrl->addMusicBook($id, $title, $price, $category);

        } catch (Exception) {
            echo "The maximum number of books should be < 10/category";
        }
    }

    public function deleteBook(): void
    {   echo "Id:";
        $id = readline("Id: ");
        if (!is_numeric($id)) { echo "Id should be a number\n";  return; }
        $id = (int)$id;

        try {
            $this->ctrl->deleteBook($id);

        } catch (Exception) {
            echo ("The book is stolen\n");
        }
    }

    public function updateBook(): void
    {   echo "Id:";
        $id = readline("Id: ");
        if (!is_numeric($id)) { echo "Id should be a number\n";  return; }
        $id = (int)$id;
        echo "title:";
        $title = readline("Title: ");
        echo "price:";
        $price = readline("Price: ");
        if (!is_numeric($id)) { echo "Price should be a number\n";  return; }
        $price = (int)$price;
        echo "category:";
        $category = readline("Category: ");

        try {
            $this->ctrl->updateBook($id, $title, $price, $category);

        } catch (Exception) {
            echo ("The book is stolen, update is impossible\n");
        }
    }

    public function display(): void
    {
        foreach ($this->ctrl->getAll() as $book) {echo $book."\n";}
    }

    public function run(): void
    {
        $this->MainMenu();
        $input = readline("Choose an option, master: ");
        if (!is_numeric($input)) {echo "Invalid input\n"; return; }
        $input = (int)$input;
        switch ($input) {
            case 1:
                $this->addBook();
                break;
            case 2:
                $this->deleteBook();
                break;
            case 3:
                $this->updateBook();
                break;
            case 4:
                $this->display();
                break;
            case 5:
                exit(0);
            default:
                echo "Invalid input\n";
                break;
        }
    }

}
