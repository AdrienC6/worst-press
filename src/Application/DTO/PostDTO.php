<?php

namespace App\Application\DTO;

use App\Domain\Model\Post;

class PostDTO implements DTOInterface
{
    public string $title;

    public function getModelClassName(): string
    {
        return Post::class;
    }
}