<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_')]
class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/l-association', name: 'asso')]
    public function asso(): Response
    {
        return $this->render('main/asso.html.twig');
    }

    #[Route('/le-topo', name: 'topo')]
    public function topo(): Response
    {
        return $this->render('main/topo.html.twig');
    }

    #[Route('/le-festival', name: 'festival')]
    public function festival(): Response
    {
        return $this->render('main/festival.html.twig');
    }

    #[Route('/le-shop', name: 'shop')]
    public function shop(): Response
    {
        return $this->render('main/shop.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig');
    }
}
