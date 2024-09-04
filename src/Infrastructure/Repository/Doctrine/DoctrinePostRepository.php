<?php

namespace App\Infrastructure\Repository\Doctrine;

use App\Application\Port\PostRepository;
use App\Domain\Model\Post;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePostRepository implements PostRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findOneBy(array $criteria, array $orderBy): ?Post
    {
        return $this->entityManager->getRepository(Post::class)->findOneBy($criteria, $orderBy);
    }

    public function save(Post $post): void
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }
}