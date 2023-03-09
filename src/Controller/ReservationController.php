<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function index(RestaurantRepository $restaurantRepository, EntityManagerInterface $em, Request $request): Response
    {

        $reservation = new Reservation();

        $reservationform = $this->createForm(ReservationFormType::class, $reservation);

        $reservationform->handleRequest($request);

        if($reservationform->isSubmitted() && $reservationform->isValid()){
            $em->persist($reservation);
            $em->flush();

            $this-> addFlash('success', "réservation éffectuée");

            return $this->redirectToRoute("home");
        }

        return $this->render('reservation.html.twig', [
            'controller_name' => 'ReservationController',
            'reservationform' => $reservationform->createView(),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}
