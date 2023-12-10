<?php
// src/Controller/RegistrationController.php

namespace App\Controller;

use App\Entity\User;
use App\Form\AgencyUserRegistrationFormTypePhpType;
use App\Form\LocataireUserRegistrationFormTypePhpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register/locataire', name: 'register_locataire')]
    public function registerLocataire(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        // Définir le rôle par défaut pour l'utilisateur locataire
        //$user->setRoles(['ROLE_LOCATAIRE']);      

        $user->setRoles(['ROLE_LOCATAIRE']);      
        // Définir une valeur par défaut


        $form = $this->createForm(LocataireUserRegistrationFormTypePhpType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hasher le mot de passe
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);

            // Autres traitements...

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register_locataire.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/register/agency', name: 'register_agency')]
    public function registerAgency(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(AgencyUserRegistrationFormTypePhpType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hasher le mot de passe
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);

            // Autres traitements...

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register_agency.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
