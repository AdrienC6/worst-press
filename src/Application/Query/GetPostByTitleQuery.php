<?php

namespace App\Application\Query;

class GetPostByTitleQuery
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}