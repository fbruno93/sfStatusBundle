<?php

namespace StatusBundle\Service;

use StatusBundle\Model\AbstractStatus;
use StatusBundle\Model\StatusResponse;

class StatusService
{
    /** @var AbstractStatus[] */
    private $services = [];

    /**
     * StatusService constructor
     *
     * @param AbstractStatus[] $services
     */
    public function __construct(array $services)
    {
        foreach ($services as $service) {
            $this->services[] = $service;
        }
    }

    /**
     * Get status of each services
     *
     * @return StatusResponse
     */
    public function getServicesStatus()
    {
        /** @var string[] */
        $servicesDown = [];

        foreach ($this->services as $service) {
            if (!$service->getStatus()) {
                $servicesDown[] = $service->getName();
            }
        }

        return new StatusResponse($servicesDown);
    }
}
