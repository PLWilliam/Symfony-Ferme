<?php

namespace App\DataFixtures;

use App\Entity\ToDoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ToDoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $todo = new ToDoList();
            $todo->setAgriculteur($this->getReference('agriculteur'.mt_rand(0,9)));
            $todo->setTache($this->getReference('tache'.mt_rand(0,9)));
            $manager->persist($todo);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            AgriculteurFixtures::class,
            TacheFixtures::class,
        ];
    }
}
