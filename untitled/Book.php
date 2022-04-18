<?php

class Book
{
protected $price, $id, $name, $category;

    /**
     * @param $price
     * @param $id
     * @param $name
     * @param $category
     */
    public function __construct($id, $price, $name, $category)
    {
        $this->price = $price;
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
    }

    public function getCategory()
     {
         return $this->category;
     }

     public function setCategory($category)
     {
         $this->category = $category;
     }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

 }