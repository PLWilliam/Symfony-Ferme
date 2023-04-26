<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Ferme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Animal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('espece',EntityType::class,[
                'class' => Espece::class,
                'choice_label' => function (Espece $espece){
                    return $espece->getNom();
                },
                'label' => 'espece'
            ])
            ->add('ferme',EntityType::class,[
                'class' => Ferme::class,
                'choice_label' => function (Ferme $ferme){
                    return $ferme->getNom();
                },
                'label' => 'ferme'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
