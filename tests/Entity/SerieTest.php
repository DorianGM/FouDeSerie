<?php

namespace app\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Serie;

class SerieTest extends KernelTestCase
{
    public function testCountSerie()
    {
        $texte = "le titre";
        $s = new Serie();
        $t = $s->setTitre($texte);
        $titre = $s->getTitre();
        
        $this->assertEquals($titre, $texte);
    }
}
