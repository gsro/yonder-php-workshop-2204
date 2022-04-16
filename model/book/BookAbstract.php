<?php

declare(strict_types=1);

abstract class BookAbstract
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }


    public function __toString(): string
    {
        return "BookAbstract{" .
            "id=" . $this->id .
            ", name='" . $this->name . '\'' .
            ", price=" . $this->price .
            ", category='" . $this->category . '\'' .
            '} ';
    }
}
