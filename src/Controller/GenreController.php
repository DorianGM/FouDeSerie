<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
use App\Entity\Serie;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre", name="genre")
     */
    public function index(): Response
    {
        return $this->render('genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }


    /**
     * @Route("/testGenre", name="testGenre")
     */
    public function testGenre(): Response
    {

        $leGenre = new Genre();
        $leGenre2 = new Genre();
        $leGenre->setLibelle("Comedie");
        $leGenre2->setLibelle("Fantastique");

        $repository=$this->getDoctrine()->getRepository(Serie::class);
        $laSerie = $repository->find(35);

        $entityManager = $this->getDoctrine()->getManager();
        

        $laSerie->addLesGenre($leGenre);
        $laSerie->addLesGenre($leGenre2);

        $entityManager->persist($leGenre);
        $entityManager->persist($leGenre2);
        

        $entityManager->persist($laSerie);
        $entityManager->flush();

        return $this->render('genre/index.html.twig', [
            'laSerie' => $laSerie,
            'leGenre' => $leGenre,
            'leGenre2' => $leGenre2,
        ]);
    }
}
