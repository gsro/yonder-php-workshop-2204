<?php

class SfBook extends AbstractBook
{
    public function __construct(int $id, string $name, int $price, string $category)
    {
        parent::__construct($id, $name, $price, $category);
    }

    public function __toString() : string
    {
        return "SfBook{ Id:$this->id , Name:$this->name, Price:$this->price, Category:$this->category}";
    }
}