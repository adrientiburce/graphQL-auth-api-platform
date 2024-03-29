<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $admin = new Admin();
        $admin->setEmail("admin")
            ->setRoles(["ROLE_ADMIN"]);
        $hash = $this->encoder->encodePassword($admin, "admin");
        $admin->setPassword($hash);
        $manager->persist($admin);

        $manager->flush();
    }
}
