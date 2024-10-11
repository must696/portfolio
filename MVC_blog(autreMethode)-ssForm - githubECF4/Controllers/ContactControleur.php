<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\Contact;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function sendMessage()
    {

        //on contrôle si les champs du formulaire sont remplis
        if (Validator::validatePost($_POST, ['nom', 'email', 'message'])) {


            //on instancie l'entité "Contact"
            $contact = new Contact();

            //on l'hydrate
            $contact->setNom($_POST['nom']);
            $contact->setEmail($_POST['email']);
            $contact->setMessage($_POST['message']);


            //on instancie le model "contact"
            $model = new ContactModel();
            $message = $model->create($contact);
            $message = ($message) ? "true" : "false";
            //on redirige l'utilisateur vers la liste des créations
            $this->redirectedToRoute('creation', 'index', $message);
        } else {
            //on affiche un message d'erreur
            $erreur = !empty($_POST) ? "Le formulaire n'a pas été correctement rempli" : "";
        }

        //on envoie le formulaire dans la vue sendMessage.php
        $this->render('contact/sendMessage', ["erreur" => $erreur, "submit" => "Ajouter"]);
    }
}
