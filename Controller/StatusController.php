<?php

namespace StatusBundle\Controller;

use StatusBundle\Service\StatusService;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatusController
{
    public function index(StatusService $statusService)
    {
        return new JsonResponse(
            $statusService->getServicesStatus()
        );
    }
}
