<?php

class SFBook extends Book {
    public function __construct(int $id, string $name, int $price, string $category) {
        parent::__construct($id, $name, $price, $category);
    }

    public function __toString(): string {
        return "SF book #" . $this->id . ": " . $this->name;
    }
}