<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DomCrawler\Crawler;

class HomeControllerTest extends WebTestCase
{
    public function testH1HomePage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $nb = $crawler->filter('h1:contains("Fou de Séries")')->count();
        $this->assertEquals(1, $nb);
    }

}
