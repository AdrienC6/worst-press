<?php

namespace App\Application\Assembler;

use App\Application\DTO\PostDTO;
use App\Domain\Model\Post;
use App\Domain\ValueObject\PostTitle;

class PostAssembler
{
    public function toDTO(Post $post): PostDTO
    {
        $DTO = new PostDTO();
        $DTO->title = $post->getTitle()->getValue();

        return $DTO;
    }

    public function toEntity(PostDTO $DTO): Post
    {
        return new Post(
            new PostTitle($DTO->title)
        );
    }
}