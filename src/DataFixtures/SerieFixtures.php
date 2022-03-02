<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class SerieFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        // for ($i = 0; $i < 5; $i++) {
        //     $uneSerie = new Serie();
        //     $uneSerie->setTitre("titre$i");
        //     $uneSerie->setResume("resume$i");
        //     $uneSerie->setImage("image$i");
        //     $manager->persist($uneSerie);
        // }
        $faker = Faker\Factory::create('fr_FR');
        // on créé 10 séries
        for ($i = 0; $i < 10; $i++) {
            $uneSerie = new Serie();
            $uneSerie->setTitre($faker->RealText(25));
            $uneSerie->setResume($faker->RealText(200));
            $uneSerie->setDuree($faker->dateTimeAD($max = 'now', $timezone = null));
            $uneSerie->setPremierediffusion($faker->dateTimeAD($max = 'now', $timezone = null));
            $uneSerie->setImage($faker->emoji);
            //valoriser les autres propriétés en utilisant la documentation
            $manager->persist($uneSerie);
        }

        $manager->flush();
    }
}
