<?php
// src/EventListener/UserTypeListener.php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserTypeListener implements EventSubscriberInterface {
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $user = $event->getData();

        // Ici, vous pouvez ajouter votre logique personnalisée
        // Par exemple, modifier certains attributs de l'utilisateur avant qu'il ne soit persisté

        if ($user) {
            // Supposons que userType doit être défini en fonction de certaines conditions
            $user->setUserType('UnCertainType');
        }
    }
}
