<?php

namespace App\DataFixtures;

use App\Entity\Tache;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TacheFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $tache = new Tache();
            $tache->setNom('Tache '.$i);
            $manager->persist($tache);
            $this->addReference("tache".$i, $tache);
        }
        $manager->flush();
    }
}
