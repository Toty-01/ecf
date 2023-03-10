<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
  #[Route('/carte', name: 'carte')]

    public function notifications(RestaurantRepository $restaurantRepository, MenuRepository $menurepository): Response
    {
        return $this->render('carte.html.twig', [
            'menu' => $menurepository->findBy([],
            ['prix' => 'asc']),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}