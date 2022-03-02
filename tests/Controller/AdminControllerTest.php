<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DomCrawler\Crawler;

class AdminControllerTest extends WebTestCase
{
    public function testAddSerie()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/series/add');
        $form = $crawler->selectButton('Ajouter')->form();
        $form['serie[titre]'] = 'Test Titre modif1';
        $form['serie[resume]'] = 'Test resume modif1';
        $client->submit($form);
        $this->assertResponseRedirects('/series');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $crawler = $client->followRedirect();
        $this->assertEquals(1, $crawler->filter('h5:contains("Test Titre modif1")')->count());
    }
}
