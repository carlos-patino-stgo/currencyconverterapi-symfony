<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConversionsTest extends WebTestCase
{
    public function testHasConversionsPage()
    {
        $client = static::createClient();
        $client->request('GET', '/conversions');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGetConversionsIsJsonResponse()
    {
        $client = static::createClient();
        $client->request('GET', '/api/conversions');

        $response = $client->getResponse();
        $data = json_decode($response->getContent(), true);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($response->getContent());
        $this->assertArrayHasKey('data', $data);
    }
}