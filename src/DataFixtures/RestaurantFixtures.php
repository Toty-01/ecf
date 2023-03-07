<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $restaurant = new Restaurant();
        $restaurant->setNom('Le Quai Antique');
        $restaurant->setCouvert(60);
        $restaurant->setOuvMidi('12h');
        $restaurant->setFermMidi('15h');
        $restaurant->setOuvSoir('19h');
        $restaurant->setFermSoir('22h');

        $manager->persist($restaurant);

        $manager->flush();
    }
}
