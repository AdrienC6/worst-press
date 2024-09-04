<?php

namespace App\Application\Port;

use App\Domain\Model\Post;

interface PostRepository
{
    public function findOneBy(array $criteria, array $orderBy): ?Post;

    public function save(Post $post): void;
}