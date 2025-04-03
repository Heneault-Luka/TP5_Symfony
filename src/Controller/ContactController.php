<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact', methods:("GET"))]
    public function listeContacts(ContactRepository $repo)
    {
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',['lesContacts' => $Contacts]);
    }
    
    #[Route('/contact/{id}', name: 'app_ficheContact', methods:("GET"))]
    public function ficheContact(Contact $contact)
    {
        return $this->render('contact/ficheContact.html.twig',['leContact' => $contact]);
    }

    #[Route('/contact/sexe/{sexe}', name: 'app_listeContactsSexe', methods:("GET"))]
    public function listeContactsSexe($sexe, ContactRepository $repo)
    {
        $Contacts=$repo->findBy(
            ['sexe' => $sexe],
           ['nom' => 'ASC']
        );
        return $this->render('contact/listeContacts.html.twig',['lesContacts' => $Contacts]);
    }
}
