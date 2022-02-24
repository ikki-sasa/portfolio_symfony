<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'required' => true,
                'label' => 'Prénom',
                'attr' => [
                    'maxLength' => 255
                ]
            ])
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'maxLength' => 255
                ]
            ])
            ->add('entreprise', TextType::class, [
                'required' => true,
                'label' => 'Nom de l\'entreprise',
                'attr' => [
                    'maxLength' => 255
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => [
                    'maxLength' => 255
                ]
            ])
            ->add('objet', TextType::class, [
                'required' => true,
                'attr' => [
                    'maxLength' => 255
                ]
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'attr' => [
                    'minLength' => 50,
                    'maxLength' => 2000
                ],
                'help' => '2000 caractères maximum'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
