<?php

namespace StatusBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusControllerTest extends WebTestCase
{
    public function testShowStatus()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testUnknowRoute()
    {
        $client = static::createClient();

        $client->request('GET', '/status-bundle/unknow-route');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}