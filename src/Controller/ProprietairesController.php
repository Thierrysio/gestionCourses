<?php

namespace App\Controller;

use App\Entity\Proprietaires;
use App\Form\ProprietairesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprietairesController extends AbstractController
{
    /**
     * @Route("/proprietaires", name="app_proprietaires")
     */
    public function index(): Response
    {
        return $this->render('proprietaires/index.html.twig', [
            'controller_name' => 'ProprietairesController',
        ]);
    }

        /**
     * @Route("/proprietaires/nouveau", name="proprietairesnouveau")
     * @Route("/proprietaires/{id}/edit", name="proprietairesmaj")
     */
    public function GestionProprietaires(Proprietaires $unProprietaire = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$unProprietaire)
        {$unProprietaire = new Proprietaires();}
        
 
        $form = $this->createForm(ProprietairesType::class,$unProprietaire);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($unProprietaire);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('proprietaires/GestionProprietaire.html.twig', [
            'form' => $form->createView(),
            'editmode' => $unProprietaire->getId() !== null
        ]);
    }
}
