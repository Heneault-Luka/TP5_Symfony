<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'app_categories', methods:("GET"))]
    public function index(CategorieRepository $repo)
    {
        $categories=$repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'LesCategories' => $categories,
        ]);
    }
}
