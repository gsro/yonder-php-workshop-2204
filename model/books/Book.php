<?php

require_once("model/entity.php");

class Book extends Entity {
    protected string $name;
    protected int $price;
    protected string $category;

    public function __construct(int $id, string $name, int $price, string $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setPrice(int $price): void {
        $this->price = $price;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }

    public function getCategory(): string {
        return $this->category;
    }
}