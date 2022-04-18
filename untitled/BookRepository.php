<?php

interface BookRepository
{
    public function DeleteOneByName(string $name): void;
    public function GetOne(int $id): Book;
    public function EditOneBookName(string $name, string $newName): void;
    public function GetAll(): array;
    public function GetAllSortedByName(): array;
}