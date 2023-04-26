<?php

namespace App\Form;

use App\Entity\Agriculteur;
use App\Entity\Tache;
use App\Entity\ToDoList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToDoListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Agriculteur',EntityType::class,[
                'class' => Agriculteur::class,
                'choice_label' => function (Agriculteur $agriculteur){
                    return $agriculteur->getNom();
                },
                'label' => 'agriculteur'
            ])
            ->add('Tache',EntityType::class,[
                'class' => Tache::class,
                'choice_label' => function (Tache $tache){
                    return $tache->getNom();
                },
                'label' => 'tache'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ToDoList::class,
        ]);
    }
}
