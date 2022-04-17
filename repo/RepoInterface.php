<?php

include_once('model/books/Book.php');

interface RepoInterface {
    public function save(Book $book): void;

    public function all(): array;
    public function find(int $id): Book;
    
    public function update(int $id, Book $book): void;

    public function delete(int $id): void;
}