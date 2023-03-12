<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Repository\DessertRepository;
use App\Repository\EntreeRepository;
use App\Repository\MenuRepository;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
  #[Route('/carte', name: 'carte')]

    public function notifications(RestaurantRepository $restaurantRepository, MenuRepository $menurepository, EntreeRepository $entreeRepository, PlatRepository $platRepository, DessertRepository $dessertRepository): Response
    {
        return $this->render('carte.html.twig', [
            'entrees' => $entreeRepository->findBy([],
            ['prix' => 'asc']),
            'plats' => $platRepository->findBy([],
            ['prix' => 'asc']),
            'desserts' => $dessertRepository->findBy([],
            ['prix' => 'asc']),
            'menu' => $menurepository->findBy([],
            ['prix' => 'asc']),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}