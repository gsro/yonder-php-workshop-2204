<?php
require_once ('Domain/Model/AbstractBook.php');
interface IRepository
{
    public function find(int $id): AbstractBook;
    public function add(AbstractBook $book): void;
    public function update(int $id, AbstractBook $book): void;
    public function delete(int $id): void;
    public function getAll(): array;
}