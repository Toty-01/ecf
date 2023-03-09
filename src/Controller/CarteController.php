<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
  #[Route('/carte', name: 'carte')]

    public function notifications(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('carte.html.twig', [
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}