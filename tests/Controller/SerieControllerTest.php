<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SerieControllerTest extends WebTestCase
{

    /**
     * @dataProvider provideUrls
     */
    public function testShowSerieIsUp($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function provideUrls()
{
    return array(
        array('/series'),
        array('/admin/series/add'),
        array('/admin/series'),
        array('/genres'),
        array('/'),
        );
    }

    
}
