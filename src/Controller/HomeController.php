<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/news", name="news")
     */
    public function news(): Response
    {
        return $this->render('home/news.html.twig');
    }

    /**
     * @Route("/testEntity", name="test")
     */
    public function testEntity(): Response{
        $laSerie = new Serie();
        $laSerie->setTitre('The Walking Dead');
        $laSerie->setResume('La fin du monde est proche !');
        $entityManager = $this->getDoctrine()->getManager();
        
        $entityManager->persist($laSerie);
        $entityManager->flush();
        
        return $this->render('home/testEntity.html.twig', ['laSerie'=>$laSerie]);
    }

}
