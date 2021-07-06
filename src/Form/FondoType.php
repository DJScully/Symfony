<?php

namespace App\Form;

use App\Entity\Fondo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FondoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titulo')
            ->add('ISBN')
            ->add('edicion')
            ->add('publicacion')
            ->add('categoria')
            ->add('Autor')
            ->add('Editorial')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fondo::class,
        ]);
    }
}
