<?php

declare(strict_types=1);

namespace Endroid\QrCodeBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwigControllerTest extends WebTestCase
{
    public function testDemoController()
    {
        $client = static::createClient();

        $client->request('GET', '/twig');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('data:image/png;base64,', $client->getResponse()->getContent());

        $client->request('GET', '/twig-invalid-option');
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertMatchesRegularExpression('#Builder option.*does not exist#', $client->getResponse()->getContent());
    }
}
