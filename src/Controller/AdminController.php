<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieFormType;
use App\Entity\Menu;
use App\Entity\Plat;
use App\Entity\Dessert;
use App\Entity\Entree;
use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Form\DessertFormType;
use App\Form\EntreeFormType;
use App\Form\HorairesFormType;
use App\Form\MenuFormType;
use App\Form\PlatFormType;
use App\Repository\DessertRepository;
use App\Repository\EntreeRepository;
use App\Repository\MenuRepository;
use App\Repository\PlatRepository;
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
    public function index(RestaurantRepository $restaurantRepository, EntityManagerInterface $em, HttpFoundationRequest $request, ReservationRepository $reservationRepository,  MenuRepository $menurepository, EntreeRepository $entreeRepository, PlatRepository $platRepository, DessertRepository $dessertRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $restaurantRepository = $em->getRepository(Restaurant::class);
        $restaurant = $restaurantRepository->find(2);


   //     $galerie = new Galerie();
        $plat = new Plat();
        $dessert = new Dessert();
        $entree = new Entree();
        $menu = new Menu();
        $horairesform = $this->createForm(HorairesFormType::class, $restaurant);
  //      $galerieform = $this->createForm(GalerieFormType::class, $galerie);
        $entreeform = $this->createForm(EntreeFormType::class, $entree);
        $platform = $this->createForm(PlatFormType::class, $plat);
        $dessertform = $this->createForm(DessertFormType::class, $dessert);
        $menuform = $this->createForm(MenuFormType::class, $menu);


        // FORMULAIRE DES HORAIRES
        $horairesform->handleRequest($request);

        if($horairesform->isSubmitted() && $horairesform->isValid()){
            $em->persist($restaurant);
            $em->flush();

            $this-> addFlash('success', "Changement horaire éffectuée");
            
            return $this->redirectToRoute("app_admin");
        }
        
 //       // FORMULAIRE DE LA GALERIE
 //       $galerieform->handleRequest($request);
//
 //       if($galerieform->isSubmitted() && $galerieform->isValid()){
 //           $em->persist($galerie);
 //           $em->flush();
//
 //           $this-> addFlash('success', "réservation éffectuée");
//
 //           return $this->redirectToRoute("app_admin");
 //       }

        // FORMULAIRE DEs entrées
        $entreeform->handleRequest($request);

        if($entreeform->isSubmitted() && $entreeform->isValid()){
            $em->persist($entree);
            $em->flush();

            $this-> addFlash('success', "entrée ajoutée avec succès");

            return $this->redirectToRoute("app_admin");
        }
        
        // FORMULAIRE DEs plats
        $platform->handleRequest($request);

        if($platform->isSubmitted() && $platform->isValid()){
            $em->persist($plat);
            $em->flush();

            $this-> addFlash('success', "Plat ajouté avec succès");

            return $this->redirectToRoute("app_admin");
        }

        // FORMULAIRE DEs desserts
        $dessertform->handleRequest($request);

        if($dessertform->isSubmitted() && $dessertform->isValid()){
            $em->persist($dessert);
            $em->flush();

            $this-> addFlash('success', "Déssert ajouté avec succès");
            
            return $this->redirectToRoute("app_admin");
        }


        // FORMULAIRE DU MENU
        $menuform->handleRequest($request);

        if($menuform->isSubmitted() && $menuform->isValid()){
            $em->persist($menu);
            $em->flush();

            $this-> addFlash('success', "Menu ajouté avec succès");
            
            return $this->redirectToRoute("app_admin");
        }

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'horairesform' => $horairesform->createView(),
            'entreeform' => $entreeform->createView(),
            'dessertform' => $dessertform->createView(),
            'platform' => $platform->createView(),
            'menuform' => $menuform->createView(),
 //           'galerieform' => $galerieform->createView(),
            'entree' => $entreeRepository->findBy([],
            ['id' => 'asc']),
            'plat' => $platRepository->findBy([],
            ['id' => 'asc']),
            'dessert' => $dessertRepository->findBy([],
            ['id' => 'asc']),
            'menu' => $menurepository->findBy([],
            ['id' => 'asc']),
            'reservation' => $reservationRepository->findBy([],
            ['date' => 'asc']),
            'restaurant' => $restaurantRepository->findBy([],
            ['ouv_midi' => 'asc'])
        ]);
    }

    #[Route('/admin/{id}/delete', name:'delete')]
    public function removeadmin(?int $id , EntityManagerInterface $em, ReservationRepository $reservationRepository): Response
    {
        $reservations = null;

        if ($id !== null) {
        $reservations = $reservationRepository->find($id);
        $em->remove($reservations);
        $em->flush();
        }


        $this-> addFlash('success', "Réservation supprimée avec succès");
        
        
        return $this->redirectToRoute('app_admin', [
            'reservations' => $reservations,
        ]); 
    }    

    #[Route('/admin/{id}/deleteentree', name:'deleteentree')]
    public function removeentree(?int $id , EntityManagerInterface $em, EntreeRepository $entreeRepository): Response
    {

        $entrees = null;
        if ($id !== null) {
        $entrees = $entreeRepository->find($id);
        $em->remove($entrees);
        $em->flush();
        }

        $this-> addFlash('success', "Entrée supprimée avec succès");
        
        return $this->redirectToRoute('app_admin', [
            'entrees' => $entrees,
        ]); 
    }
    #[Route('/admin/{id}/deleteplat', name:'deleteplat')]
    public function removeplat(?int $id , EntityManagerInterface $em, PlatRepository $platRepository): Response
    {

        $plats = null;
        if ($id !== null) {
        $plats = $platRepository->find($id);
        $em->remove($plats);
        $em->flush();
        }

        $this-> addFlash('success', "Plat supprimée avec succès");
        
        return $this->redirectToRoute('app_admin', [
            'plats' => $plats,
        ]); 
    }
    #[Route('/admin/{id}/deletedessert', name:'deletedessert')]
    public function removedessert(?int $id , EntityManagerInterface $em, DessertRepository $dessertRepository): Response
    {

        $desserts = null;
        if ($id !== null) {
        $desserts = $dessertRepository->find($id);
        $em->remove($desserts);
        $em->flush();
        }

        $this-> addFlash('success', "Déssert supprimé avec succès");
        
        return $this->redirectToRoute('app_admin', [
            'desserts' => $desserts,
        ]); 
    }

    #[Route('/admin/{id}/deletemenu', name:'deletemenu')]
    public function removemenu(?int $id , EntityManagerInterface $em, MenuRepository $menuRepository): Response
    {

        $menus = null;
        if ($id !== null) {
        $menus = $menuRepository->find($id);
        $em->remove($menus);
        $em->flush();
        }

        $this-> addFlash('success', "Menu supprimé avec succès");
        
        return $this->redirectToRoute('app_admin', [
            'menus' => $menus,
        ]); 
    }

}
