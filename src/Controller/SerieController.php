<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="series")
     */
    public function index(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Serie::class);
        $lesSeries = $repository->findAll();

        return $this->render('serie/index.html.twig', [
            'series' => $lesSeries,
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function lesDetails($id): Response
    {
        $repository=$this->getDoctrine()->getRepository(Serie::class);
        $laSeries = $repository->find($id);

        return $this->render('serie/details.html.twig', [
            'serie' => $laSeries,
        ]);
    }

    /**
     * @Route("/series/genres/{id}", name="legenre")
     */
    public function listeSeriesByGenre($id): Response
    {
        $repository=$this->getDoctrine()->getRepository(Genre::class);
        $leGenre = $repository->find($id);
        $lesSeries = $leGenre->getLesSeries();

        return $this->render('serie/index.html.twig', [
            'series' => $lesSeries,
        ]);
    }
}
