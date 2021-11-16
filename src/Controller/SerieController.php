<?php

namespace App\Controller;

use App\Entity\Serie;
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
}
