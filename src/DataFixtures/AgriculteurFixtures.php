<?php

namespace App\DataFixtures;

use App\Entity\Agriculteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AgriculteurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $agriculteur = new Agriculteur();
            $agriculteur->setNom('Agriculteur '.$i);
            $agriculteur->setFerme($this->getReference('ferme'.mt_rand(0,9)));
            $manager->persist($agriculteur);
            $this->addReference("agriculteur".$i, $agriculteur);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            FermeFixtures::class,
        ];
    }
}
