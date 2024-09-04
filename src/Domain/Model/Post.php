<?php

namespace App\Domain\Model;

use App\Domain\ValueObject\PostTitle;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "posts")]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "title")]
    private PostTitle $title;

    public function __construct(PostTitle $title)
    {
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): PostTitle
    {
        return $this->title;
    }
}