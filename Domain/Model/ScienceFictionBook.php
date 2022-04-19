<?php

class ScienceFictionBook extends AbstractBook
{
    public function __construct(int $_id, string $_name, int $_price, string $_category)
    {
        parent::__construct($_id, $_name, $_price, $_category);
    }

    public function __toString(): string
    { return "ScienceFictionBook: " .  $this->id . ", " . $this->name . ", " . $this->price . "$, " . $this->category . " ";}

}