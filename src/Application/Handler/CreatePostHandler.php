<?php

namespace App\Application\Handler;

use App\Application\Command\CreatePostCommand;
use App\Application\Port\PostRepository;
use App\Domain\Model\Post;
use App\Domain\ValueObject\PostTitle;

class CreatePostHandler
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function handle(CreatePostCommand $command): void
    {
        $post = new Post(
            new PostTitle($command->title)
        );

        $this->postRepository->save($post);
    }
}