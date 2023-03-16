<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
        ){}

    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@admin.com');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'imanadmin')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

            $user = new Users();
            $user->setEmail("toto@toto.com");
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'totototo')
            );
        
        $manager->persist($user);

        $manager->flush();
    }
}
