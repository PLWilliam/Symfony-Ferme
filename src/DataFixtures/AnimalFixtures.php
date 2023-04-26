<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $animal = new Animal();
            $animal->setNom('Animal '.$i);
            $animal->setEspece($this->getReference("espece".mt_rand(0,9)));
            $animal->setFerme($this->getReference("ferme".mt_rand(0,9)));

            
            $manager->persist($animal);
            $this->addReference("animal".$i, $animal);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FermeFixtures::class,
            EspeceFixtures::class,
        ];
    }
}
