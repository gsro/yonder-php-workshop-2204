<?php

declare(strict_types=1);

namespace App\Models;

abstract class AbstractBook
{
    public const CATEGORIES = ['sf', 'music', 'history'];

    public function __construct(private string $id, private string $name, private string $category, private int $price)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
