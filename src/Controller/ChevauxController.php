<?php

namespace App\Controller;

use App\Entity\Chevaux;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ChevauxController extends AbstractController
{
    /**
     * @Route("/chevaux", name="app_chevaux")
     */
    public function index(): Response
    {
        return $this->render('chevaux/index.html.twig', [
            'controller_name' => 'ChevauxController',
        ]);
    }

        /**
     * @Route("/voirlesgains/{id}", name="voirlesgains")
     */
    public function voirlesgains(Chevaux $leCheval,EntityManagerInterface $manager): Response
    {
        return $this->render('chevaux/voirlesgains.html.twig', [
            'monCheval' => $leCheval,
        ]);
    }
}
