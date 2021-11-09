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
        $lesSeries = $repository->lesDernieres();

        return $this->render('serie/index.html.twig', [
            'series' => $lesSeries,
        ]);
    }
}
