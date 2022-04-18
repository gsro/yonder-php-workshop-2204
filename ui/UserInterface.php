<?php

include_once ("services/Services.php");

class UserInterface {
    private Services $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function example()
    {
        $this->services->example();
    }

    public function run() : void
    {
        try {
            while(true)
            {
                $this->menu();
                $input = readline('>>>>> ');
                if(!is_numeric($input))
                {
                    echo 'wrong command'. PHP_EOL;
                }
                else
                {
                    $input = (int)$input;
                    switch ($input)
                    {
                        case 0:
                            return;
                        case 1:
                            $this->showAllBooks();
                            break;
                        case 2:
                            $this->addBook();
                            break;
                        case 3:
                            $this->updateBook();
                            break;
                        case 4:
                            $this->deleteBook();
                            break;
                        default:
                            echo 'wrong command'. PHP_EOL;
                            break;
                    }
                }
            }
        }catch (Exception $e)
        {
            echo $e->getMessage();
            $this->run();
        }

    }

    private function menu() : void
    {
        echo PHP_EOL;
        echo '====== LIBRARY INVENTORY ======'. PHP_EOL;
        echo '1 - show all books'. PHP_EOL;
        echo '2 - add book'. PHP_EOL;
        echo '3 - update book'. PHP_EOL;
        echo '4 - delete book'. PHP_EOL;
        echo '0 - exit'. PHP_EOL;
    }

    private function showAllBooks() : void
    {
        echo PHP_EOL;
        echo '===== BOOK LIST IN ALPHABETICALLY ORDER ====='. PHP_EOL;
        $bookList = $this->services->getAll();
        foreach ($bookList as $book)
            echo $book . PHP_EOL;
    }

    private function addBook() : void
    {
        echo PHP_EOL;
        echo '===== ADD BOOK ====='. PHP_EOL;
        echo '1 - add sf book' . PHP_EOL;
        echo '2 - add history book' . PHP_EOL;
        echo '3 - add musical book' . PHP_EOL;
        echo '0 - return to main menu' . PHP_EOL;

        $input = readline('>>>>> ');
        if(!is_numeric($input))
        {
            echo 'wrong command'. PHP_EOL;
        }
        else
        {
            $input = (int)$input;
            switch ($input)
            {
                case 0:
                    $this->menu();
                    break;
                case 1:
                    $this->addUtils(1);
                    break;
                case 2:
                    $this->addUtils(2);
                    break;
                case 3:
                    $this->addUtils(3);
                    break;
                default:
                    echo 'wrong command'. PHP_EOL;
                    $this->addBook();
            }
        }
    }

    private function addUtils(int $optionNumber) : void
    {
        echo PHP_EOL;
        echo 'Enter the data for the book' . PHP_EOL;
        $id = readline('id: ');
        if (!is_numeric($id)) {
            echo "the id needs to be an integer" . PHP_EOL;
            $this->addBook();
        }
        $name = readline('name: ');
        $price = readline('price: ');
        if (!is_numeric($price)) {
            echo "the price needs to be an integer" . PHP_EOL;
            $this->addBook();
        }
        $category = readline('category: ');

        switch ($optionNumber){
            case 1:
                $this->services->add(new SfBook((int)$id,$name,(int)$price,$category));
                break;
            case 2:
                $this->services->add(new HistoryBook((int)$id,$name,(int)$price,$category));
                break;
            case 3:
                $this->services->add(new MusicBook((int)$id,$name,(int)$price,$category));
                break;
            default:
                break;
        }
    }

    private function updateBook() : void
    {
        echo PHP_EOL;
        echo 'Enter the data for the book' . PHP_EOL;
        $id = readline('id: ');
        if (!is_numeric($id)) {
            echo "the id needs to be an integer" . PHP_EOL;
            $this->addBook();
        }
        $name = readline('name: ');
        $price = readline('price: ');
        if (!is_numeric($price)) {
            echo "the price needs to be an integer" . PHP_EOL;
            $this->addBook();
        }
        $category = readline('category: ');

        $book = $this->services->get((int)$id);

        if($book instanceof SfBook)
            $this->services->update((int)$id, new SfBook((int)$id,$name,(int)$price,$category));
        elseif ($book instanceof HistoryBook)
            $this->services->update((int)$id, new HistoryBook((int)$id,$name,(int)$price,$category));
        elseif ($book instanceof MusicBook)
            $this->services->update((int)$id, new MusicBook((int)$id,$name,(int)$price,$category));

    }

    private function deleteBook() : void
    {
        echo PHP_EOL;
        echo '===== DELETE BOOK ====='. PHP_EOL;
        echo 'Please enter the id of the book to be added'. PHP_EOL;

        $id = readline("id: ");
        if (!is_numeric($id)) {
            echo "the id needs to be an integer" . PHP_EOL;
            return;
        }
        $this->services->delete((int)$id);
    }
}