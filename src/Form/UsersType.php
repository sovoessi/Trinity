<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email')

        ->add('nom', TextType::class, [
            'mapped' => true
        ])

        ->add('prenom', TextType::class, [
            'mapped' => true
        ])

        ->add('tel', TextType::class, [
            'mapped' => true
        ])

        ->add('service', ChoiceType::class, [
            'choices'  => [
                'Direction' => 'Direction',
                'Communication' => 'Communication',
                'Technique' => 'Technique',
                'Assistant' => 'Assistant',
                'Linguistique' => 'Linguistique'
            ],
            'mapped' => true,
            'constraints' => [
                new NotBlank([
                    'message' => 'Please Confirm your password',
                ]),
            ]    
        ])

        ->add('roles', ChoiceType::class, [
            'choices' => [
                'Admin' => 'ROLE_ADMIN',
                'Collaborateur' => 'ROLE_USER'
            ],
            'mapped' => true,
            'multiple' => true
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}