<?php
// src/Form/AgencyUserRegistrationFormTypePhpType.php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgencyUserRegistrationFormTypePhpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('isVerified')
            ->add('firstName')
            ->add('lastName')
            ->add('telephone')
            ->add('address')
            ->add('presentation')
            ->add('employmentStatus')
            ->add('netIncome')
            ->add('guarantee')
            ->add('profilePicture')
            ->add('userType')
            ->add('nomAgence')
            ->add('numeroRue')
            ->add('nomRue')
            ->add('codePostal')
            ->add('ville')
            ->add('carteProfessionnelle')
            ->add('siren')
            ->add('siret')
            ->add('kbis')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
