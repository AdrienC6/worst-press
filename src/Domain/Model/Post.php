<?php

namespace App\Domain\Model;

use App\Domain\ValueObject\PostTitle;

class Post
{
    private PostTitle $title;

    public function __construct(PostTitle $title)
    {
        $this->title = $title;
    }

    public function getTitle(): PostTitle
    {
        return $this->title;
    }
}