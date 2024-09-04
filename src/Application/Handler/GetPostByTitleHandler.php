<?php

namespace App\Application\Handler;

use App\Application\Port\PostRepository;
use App\Application\Query\GetPostByTitleQuery;
use App\Domain\Model\Post;

class GetPostByTitleHandler
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function handle(GetPostByTitleQuery $query): ?Post
    {
        return $this->postRepository->findOneBy(['title' => $query->title], []);
    }
}