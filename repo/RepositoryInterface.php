<?php
declare(strict_types=1);




include_once('model/book/BookAbstract.php');

interface RepositoryInterface
{
    public function getAll(): array;

    public function getOne(int $id): BookAbstract;

    public function save(BookAbstract $data): void;

    public function update(int $id, BookAbstract $data): void;

    public function delete(int $id): void;
}