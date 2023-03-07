<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('reservation.html.twig', [
            'controller_name' => 'ReservationController',
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}
