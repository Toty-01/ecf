<?php

namespace App\Controller;

use App\Repository\GalerieRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function number(RestaurantRepository $restaurantRepository, GalerieRepository $galerieRepository): Response
    {
        return $this->render('index.html.twig', [
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc']),
            'galerie' => $galerieRepository->findBy([],
            ['nom' => 'asc'])
        ]);

    }
}
