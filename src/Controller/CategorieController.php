<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categories', name:'app_categories', methods:("GET"))]
    public function listeCategories(CategorieRepository $repo)
    {
        $categories=$repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', ['lesCategories' => $categories]);
    }

    #[Route('/categorie/{id}', name:'app_fichecategorie', methods:("GET"))]
    public function ficheCategorie(Categorie $categorie)
    {
        return $this->render('categorie/ficheCategorie.html.twig', ['laCategorie' => $categorie]);
    }
}
