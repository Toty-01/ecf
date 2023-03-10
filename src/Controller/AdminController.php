<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Entity\Menu;
use App\Entity\Plats;
use App\Entity\Restaurant;
use App\Form\CarteFormType;
use App\Form\HorairesFormType;
use App\Form\GalerieFormType;
use App\Form\MenuFormType;
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
        $menu = new Menu();
        $horairesform = $this->createForm(HorairesFormType::class, $restaurant);
        $galerieform = $this->createForm(GalerieFormType::class, $galerie);
        $carteform = $this->createForm(CarteFormType::class, $carte);
        $menuform = $this->createForm(MenuFormType::class, $menu);


        // FORMULAIRE DES HORAIRES
        $horairesform->handleRequest($request);

        if($horairesform->isSubmitted() && $horairesform->isValid()){
            $em->persist($restaurant);
            $em->flush();

            $this-> addFlash('success', "Changement horaire éffectuée");
            
            return $this->redirectToRoute("app_admin");
        }
        
        // FORMULAIRE DE LA GALERIE
        $galerieform->handleRequest($request);

        if($galerieform->isSubmitted() && $galerieform->isValid()){
            $em->persist($galerie);
            $em->flush();

            $this-> addFlash('success', "réservation éffectuée");

            return $this->redirectToRoute("app_admin");
        }

        // FORMULAIRE DE LA CARTE
        $carteform->handleRequest($request);

        if($carteform->isSubmitted() && $carteform->isValid()){
            $em->persist($carte);
            $em->flush();

            $this-> addFlash('success', "réservation éffectuée");

            return $this->redirectToRoute("app_admin");
        }

        // FORMULAIRE DU MENU
        $menuform->handleRequest($request);

        if($menuform->isSubmitted() && $menuform->isValid()){
            $em->persist($menu);
            $em->flush();

            $this-> addFlash('success', "réservation éffectuée");

            return $this->redirectToRoute("app_admin");
        }

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'horairesform' => $horairesform->createView(),
            'carteform' => $carteform->createView(),
            'menuform' => $menuform->createView(),
            'galerieform' => $galerieform->createView(),
            'reservation' => $reservationRepository->findBy([],
            ['date' => 'asc']),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }
}
