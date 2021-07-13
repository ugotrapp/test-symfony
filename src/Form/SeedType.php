<?php

namespace App\Form;

use App\Entity\HarvestPeriod;
use App\Entity\PlantingPeriod;
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
            ->add('plantingPeriod', EntityType::class, [
                'class'=> PlantingPeriod::class,
                'choice_label' => 'name',
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.rank', 'ASC')
                    ;
                },
                'expanded'=>true,
            ])
            ->add('harvestPeriod', EntityType::class, [
                'class'=> HarvestPeriod::class,
                'choice_label' => 'name',
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.rank', 'ASC')
                    ;
                },
                'expanded'=>true,
            ])
            
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
