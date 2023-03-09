<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Entity\Plats;
use App\Entity\Restaurant;
use App\Form\CarteFormType;
use App\Form\HorairesFormType;
use App\Form\GalerieFormType;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(RestaurantRepository $restaurantRepository, EntityManagerInterface $em, HttpFoundationRequest $request, ReservationRepository $reservationRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $restaurant = new Restaurant();
        $galerie = new Galerie();
        $carte = new Plats();
        $horairesform = $this->createForm(HorairesFormType::class, $restaurant);
        $galerieform = $this->createForm(GalerieFormType::class, $galerie);
        $carteform = $this->createForm(CarteFormType::class, $carte);
        
        $carteform->handleRequest($request);

        if($carteform->isSubmitted() && $carteform->isValid()){
            $em->persist($carte);
            $em->flush();

            $this-> addFlash('success', "réservation éffectuée");

            return $this->redirectToRoute("carte");
        }

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'horairesform' => $horairesform->createView(),
            'carteform' => $carteform->createView(),
            'galerieform' => $galerieform->createView(),
            'reservation' => $reservationRepository->findBy([],
            ['date' => 'asc']),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}
