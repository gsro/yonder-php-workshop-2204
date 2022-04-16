<?php
declare(strict_types=1);


include('repo/RepositoryInterface.php');
include_once('model/book/BookAbstract.php');
include_once('model/validator/BookValidator.php');
class BookRepo implements RepositoryInterface
{
    private array $books;

    public function __construct()
    {
        $this->books = [];
    }

    public function getAll(): array
    {
        return $this->books;
    }

    /**
     * @throws Exception
     */
    public function getOne(int $id): BookAbstract
    {
        if (!isset($this->books[$id])) {
            throw new Exception('Book not found');
        }
        return $this->books[$id];
    }

    /**
     * @throws BookValidationException
     * @throws Exception
     */
    public function save(BookAbstract $data): void
    {
        BookValidator::validate($data);
        $category = $data->getCategory();
        $count = 0;
        foreach ($this->books as $book) {
            if($book->getCategory() === $category) {
                $count++;
            }
        }
        if($count >= 10) {
            throw new Exception('You can only have 10 books in a category('.$category.')');
        }
        if(isset($this->books[$data->getId()])) {
            throw new Exception('Book already exists');
        }
        $this->books[$data->getId()] = $data;
    }

    /**
     * @throws BookValidationException
     */
    public function update(int $id, BookAbstract $data): void
    {
        BookValidator::validate($data);
        $this->books[$id] = $data;
    }

    public function delete(int $id): void
    {
        unset($this->books[$id]);
    }
}

