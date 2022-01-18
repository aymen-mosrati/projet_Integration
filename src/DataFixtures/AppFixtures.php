<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setNom("admin");
        $user->setPrenom("admin");
        $user->setEmail("admin@gmail.com");
        $user->setPassword('@admin');
        $user->setAdresse("Tunisia");
        $user->setTelephone('20202020');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();
    }
}
