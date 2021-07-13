<?php

namespace App\Form;

use App\Entity\Family;
use App\Entity\Seed;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class SeedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('advice')
            ->add('quantity')
            // ->add('plantingPeriod')
            // ->add('harvestPeriod')
            ->add('family', EntityType::class, [
                'class' => Family::class,
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('f')
                        ->orderBy('f.name', 'ASC')
                    ;
                },
                    
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seed::class,
        ]);
    }
}
