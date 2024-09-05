<?php

namespace App\UI\Controller;

use App\Application\Service\PostService;
use App\Application\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private ResponseService $responseService;
    private PostService $postService;

    public function __construct(PostService $postService, ResponseService $responseServic)
    {
        $this->postService = $postService;
        $this->responseService = $responseServic;
    }

    #[Route('/entity/{title}', name: 'get_entity_by_id', methods: ['GET'])]
    public function getEntityByTitle(string $title): JsonResponse
    {
        $postDTO = $this->postService->getPostDTOByTitle($title);

        return $this->responseService->generateObjectDTOResponse($postDTO);
    }
}