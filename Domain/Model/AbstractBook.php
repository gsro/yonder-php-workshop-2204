<?php

abstract class AbstractBook
{
    protected int $id;
    protected string $name;
    protected int $price;
    protected string $category;

    public function __construct(int $_id,string $_name,int $_price,string $_category)
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->price = $_price;
        $this->category = $_category;
    }

    public function getId(): int{ return $this->id; }

    public function getName(): string {return $this->name;}

    public function setName(string $name): void {$this->name = $name;}

    public function getPrice(): int{return $this->price;}

    public function setPrice(int $price): void {$this->price = $price;}

    public function getCategory(): string{return $this->category;}

    public function setCategory(string $category): void{$this->category = $category;}

    public function __toString(): string
    { return "Book: " .  $this->id . ", " . $this->name . ", " . $this->price . "$, " . $this->category . " ";}
}