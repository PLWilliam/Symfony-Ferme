<?php

namespace App\DataFixtures;

use App\Entity\Espece;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EspeceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $espece = new Espece();
            $espece->setNom('Animal '.$i);
            $manager->persist($espece);
            $this->addReference("espece".$i, $espece);
        }
        $manager->flush();
    }
}
