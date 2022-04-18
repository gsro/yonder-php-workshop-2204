<?php

interface IRepository
{
    public function get(int $id): AbstractBook;
    public function getAll(): array;
    public function add(AbstractBook $book): void;
    public function update(int $id, AbstractBook $book): void;
    public function delete(int $id): void;
}