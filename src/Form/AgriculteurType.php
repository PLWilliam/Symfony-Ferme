<?php

namespace App\Form;

use App\Entity\Agriculteur;
use App\Entity\Ferme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgriculteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
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
            'data_class' => Agriculteur::class,
        ]);
    }
}
