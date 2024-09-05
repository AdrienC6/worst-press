<?php

namespace App\Application\Service;

use App\Application\DTO\DTOInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function generateObjectDTOResponse(?DTOInterface $object): JsonResponse
    {
        $data = $this->getObjectDTOResponseData($object);
        $statusCode = $this->getStatusCode($object);

        return new JsonResponse($data, $statusCode);
    }

    private function getStatusCode(?DTOInterface $object): int
    {
        return $object ? Response::HTTP_OK : Response::HTTP_NOT_FOUND;
    }

    private function getObjectDTOResponseData(?DTOInterface $object): array
    {
        try {
            $data = $object ? [$this->getObjectShortName($object) => $object] : null;
        } catch (ReflectionException $e) {
            $data = null;
            $this->logger->error($e->getMessage());
        }

        return [
            'error' => !$object,
            'errorMessage' => $object ? null : 'Object not found',
            'data' => $data
        ];
    }

    /**
     * @throws ReflectionException
     */
    private function getObjectShortName(DTOInterface $object): string
    {
        $reflectionObject = new ReflectionClass($object->getModelClassName());
        return mb_strtolower($reflectionObject->getShortName());
    }
}