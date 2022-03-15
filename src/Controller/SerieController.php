<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="series")
     */
    public function index(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Genre::class);
        $lesGenres = $repository->findAll();
        $repository=$this->getDoctrine()->getRepository(Serie::class);
        $lesSeries = $repository->findAll();

        return $this->render('serie/index.html.twig', [
            'series' => $lesSeries,
            'genres' => $lesGenres
            
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
            'genres'=> $leGenre
        ]);
    }

    /**
     * @Route("/series/{id}/like", name="like", methods="GET")
     */
    public function getLikeOneSerie($id): JsonResponse
    {
        $repository=$this->getDoctrine()->getRepository(Serie::class);
        $laSerie= $repository->find($id);

        $likes = $laSerie->getLikes();
        $likes = $laSerie->setLikes($likes+1);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($laSerie);
        $entityManager->flush();
        $tabJSON = [
                "likes"=> $laSerie->getLikes()
            ];
            


        return new JsonResponse($tabJSON);
    }
}
