<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;
use App\Form\SerieType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/series/add", name="addSerie")
     */
    public function index(Request $request): Response
    {

        $laSerie = new Serie();
        $form = $this->createForm(SerieType::class, $laSerie);
        dump($laSerie);
        $form->handleRequest($request);
        dump($laSerie);

        if ($form->isSubmitted()  && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($laSerie);
            $entityManager->flush();
            return $this->redirectToRoute('series');
        }


        return $this->render('admin/index.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/series", name="Serie")
     */
    public function index2(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Serie::class);
        $lesSeries = $repository->findAll();

        return $this->render('admin/admin.html.twig', [
            'series' => $lesSeries,

        ]);
    }

    /**
     * @Route("/admin/series/{id}", name="deleteSerie", requirements={"id"="\d+"}, methods="DELETE")
     */
    public function deleteUneSerie(Request $request, $id): Response
    {
        $token = $request->get('token');
        dump($token);
        $nomToken="delete_serie".$id;
        if ($this->isCsrfTokenValid($nomToken, $token)) {
            $repository = $this->getDoctrine()->getRepository(Serie::class);
            $laSerie = $repository->find($id);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($laSerie);
            $entityManager->flush();
        }
        return $this->redirectToRoute('Serie');
    }
}
