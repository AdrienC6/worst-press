<?php

namespace App\Domain\ValueObject;

class PostTitle implements ValueObjectInterface
{
    private string $title;

    public function __construct(string $title)
    {
        if (empty($title)) {
            throw new \InvalidArgumentException("Title can't be empty");
        }

        $this->title = $title;
    }

    public function getValue(): string
    {
        return $this->title;
    }
}