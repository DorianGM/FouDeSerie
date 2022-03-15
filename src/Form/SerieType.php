<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Genre;
use Doctrine\ORM\EntityRepository;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('duree')
            ->add('premierediffusion')
            ->add('image')
            ->add(
                'lesGenres',
                EntityType::class,
                array(
                    'class' => Genre::class,
                    'choice_label' => 'libelle', // libelle est la propriété de l'entité genre que l'on veut afficher
                    'multiple' => true, // permet la sélection multiple
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('lg')
                            ->orderBy('lg.libelle', 'ASC');
                    }
                )
                );
    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
