<?php

namespace App\Application\Command;

class CreatePostCommand
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}