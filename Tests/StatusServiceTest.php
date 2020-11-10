<?php

namespace StatusBundle\Tests;

use PHPUnit\Framework\TestCase;
use StatusBundle\Model\StatusResponse;
use StatusBundle\Service\StatusService;
use StatusBundle\Status\KoStatus;
use StatusBundle\Status\OkStatus;

class StatusServiceTest extends TestCase
{
    public function testKoService()
    {
        $koStatus = new KoStatus();
        $okStatus = new OkStatus();
        $service = new StatusService([
            $koStatus,
            $okStatus
        ]);

        $result = $service->getServicesStatus();

        $this->assertEquals(StatusResponse::STATUS_KO, $result->getStatus());
        $this->assertEquals([$koStatus->getName()], $result->getErrors());
    }

    public function testOkService()
    {
        $okStatus = new OkStatus();
        $service = new StatusService([
            $okStatus
        ]);

        $result = $service->getServicesStatus();

        $this->assertEquals(StatusResponse::STATUS_OK, $result->getStatus());
        $this->assertEquals([], $result->getErrors());
    }
}