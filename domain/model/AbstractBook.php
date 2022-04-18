<?php

abstract class AbstractBook
{
    protected int $id;
    protected string $name;
    protected int $price;
    protected string $category;

    public function __construct(int $id, string $name, int $price, string $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function __toString() : string
    {
        return "AbstractBook{ Id:$this->id , Name:$this->name, Price:$this->price, Category:$this->category}";
    }

}