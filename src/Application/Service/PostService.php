<?php

namespace App\Application\Service;

use App\Application\Assembler\PostAssembler;
use App\Application\DTO\PostDTO;
use App\Application\Handler\GetPostByTitleHandler;
use App\Application\Query\GetPostByTitleQuery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostService
{
    private GetPostByTitleHandler $getPostByTitleHandler;
    private PostAssembler $postAssembler;

    public function __construct(GetPostByTitleHandler $getPostByTitleHandler, PostAssembler $postAssembler)
    {
        $this->getPostByTitleHandler = $getPostByTitleHandler;
        $this->postAssembler = $postAssembler;
    }

    public function getPostDTOByTitle(string $title): ?PostDTO
    {
        $query = new GetPostByTitleQuery($title);
        $post = $this->getPostByTitleHandler->handle($query);

        if (null === $post) {
            return null;
        }

        return $this->postAssembler->toDTO($post);
    }
}