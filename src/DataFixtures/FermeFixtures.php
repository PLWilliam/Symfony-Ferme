<?php

namespace App\DataFixtures;

use App\Entity\Ferme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FermeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $ferme = new Ferme();
            $ferme->setNom('Ferme '.$i);
            $manager->persist($ferme);
            $this->addReference("ferme".$i, $ferme);
        }

        
        $manager->flush();
    }
}
