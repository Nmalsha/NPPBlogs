<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class homeController extends WebTestCase
{
    private $client;

    public function testLandingPageIsOk(): void
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/');
        $this->assertTrue(true);

    }

}
