<?php

class Console {
    
    private $ctrl;
    private $stdin;
	function __construct(BooksController $ctrl) {
        $this->ctrl = $ctrl;
        $this->stdin = fopen('php://stdin', 'r');
	}

    function run() {
        $running = true;
        
        while ($running) {
            echo "1 - add, 2 - list, 3 - update, 4 - remove\n > ";
            fscanf($this->stdin, '%d', $cmd);
            switch ($cmd) {
                case '1':
                    $this->addBook();
                    break;
                case '2':
                    $this->list();
                    break;
                case '3':
                    $this->update();
                    break;
                case '4':
                    $this->remove();
                    break;
                default:
                    $running = false;
            }
        }
    }

    function addBook() {
        $options = ['type (sf, musical, history)', 'ID', 'name', 'price', 'category'];
        $formats = ['%s', '%d', '%s', '%d', '%s'];
        $input = [];

        $index = 0;
        foreach ($formats as $format) {
            echo $options[$index] . ' > ';
            fscanf($this->stdin, $format, $input[]);
            $index++;
        }

        if (!is_numeric($input[1])) {
            echo "Id must be a number\n";
            return;
        }

        if (!is_numeric($input[3])) {
            echo "Price must be a number\n";
            return;
        } 

        try {
            $this->ctrl->addBook($input[1], $input[2], $input[3], $input[4], $input[0]);
        } catch (RuntimeException $e) {
            echo $e->getMessage() . "\n";
        }
    }

    function list() {
        foreach ($this->ctrl->list() as $book) {
            echo "$book\n";
        }
    }

    function update() {
        $options = ['ID', 'name', 'price', 'category'];
        $formats = ['%d', '%s', '%d', '%s'];
        $input = [];

        $index = 0;
        foreach ($formats as $format) {
            echo $options[$index] . ' > ';
            fscanf($this->stdin, $format, $input[]);
            $index++;
        }

        if (!is_numeric($input[0])) {
            echo "Id must be a number\n";
            return;
        }

        if (!is_numeric($input[2])) {
            echo "Price must be a number\n";
            return;
        } 

        try {
            $this->ctrl->updateBook($input[0], $input[1], $input[2], $input[3]);
        } catch (RuntimeException $e) {
            echo $e->getMessage() . "\n";
        } 
    }

    function remove() {
        $options = ['ID'];
        $formats = ['%d'];
        $input = [];

        $index = 0;
        foreach ($formats as $format) {
            echo $options[$index] . ' > ';
            fscanf($this->stdin, $format, $input[]);
            $index++;
        }

        if (!is_numeric($input[0])) {
            echo "Id must be a number\n";
            return;
        }

        try {
            $this->ctrl->removeBook($input[0]);
        } catch (RuntimeException $e) {
            echo $e->getMessage() . "\n";
        }
    }
}