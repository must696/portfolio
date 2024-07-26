<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\Creation;
use App\Models\CreationModel;

class CreationController extends Controller
{

    //Méthode qui permet d'afficher la liste des créations
    public function index(string $message = "")
    {
        //on instancie la classe CreationModel
        $creations = new CreationModel();

        //on stocke dans une variable le return de la methode findAll()
        $list = $creations->findAll();

        $this->render('creation/index', ['list' => $list, 'message' => $message]);
    }

    //Méthode d'ajout d'une création
    public function add()
    {
        //on contrôle si les champs du formulaire sont remplis
        if (Validator::validatePost($_POST, ['title', 'description', 'date']) && Validator::validateFiles($_FILES, ['picture'])) {

            //upload de l'image dans le dossiers "images"
            move_uploaded_file($_FILES["picture"]["tmp_name"], "images/" . $_FILES["picture"]["name"]);
            //on stocke le chemin de l'image
            $picture = "images/" . $_FILES["picture"]["name"];

            //on instancie l'entité "Creation"
            $creation = new Creation();

            //on l'hydrate
            $creation->setTitle($_POST['title']);
            $creation->setDescription($_POST['description']);
            $creation->setCreated_at($_POST['date']);
            $creation->setPicture($picture);

            //on instancie le model "creation"
            $model = new CreationModel();
            $message = $model->create($creation);
            $message = ($message) ? "true" : "false";
            //on redirige l'utilisateur vers la liste des créations
            $this->redirectedToRoute('creation', 'index', $message);
        } else {
            //on affiche un message d'erreur
            $erreur = !empty($_POST) ? "Le formulaire n'a pas été correctement rempli" : "";
        }

        //on envoie le formulaire dans la vue add.php
        $this->render('creation/add', ["erreur" => $erreur, "submit" => "Ajouter"]);
    }

    //Méthode pour afficher une création
    public function showCreation($id)
    {

        //On instancie la classe CreationModel

        $creations = new CreationModel();

        //on stocke dans une variable le return de la methode find()
        $creation = $creations->find($id);

        $this->render('creation/showCreation', ['creation' => $creation]);
    }

    //méthode pour la mise à jour de la création
    public function updateCreation($id)
    {
        //on contrôle si les champs du formulaire sont remplis
        if (Validator::validatePost($_POST, ['title', 'description', 'date', 'hidden'])) {

            //on instancie l'entité "Creation"
            $creation = new Creation();

            //on l'hydrate
            $creation->setTitle($_POST['title']);
            $creation->setDescription($_POST['description']);
            $creation->setCreated_at($_POST['date']);

            //si une nouvelle image a été uploadée
            if (Validator::validateFiles($_FILES, ['picture'])) {

                //upload de l'image dans le dossier "images"
                move_uploaded_file($_FILES["picture"]["tmp_name"], "images/" . $_FILES["picture"]["name"]);

                //on stocke le chemin de l'image
                $picture = "images/" . $_FILES["picture"]["name"];

                //on hydrate la propriété picture de la classe "Creation"
                $creation->setPicture($picture);

                //sinon on garde le lien de l'image par défaut du champ caché
            } else {
                $creation->setPicture($_POST['hidden']);
            }

            //on instancie le modèle "creation" pour l'update
            $creations = new CreationModel();
            $message = $creations->update($id, $creation);
            $message = ($message) ? "true" : "false";

            //on redirige l'utilisateur vers la liste des créations
            $this->redirectedToRoute('creation', 'index', $message);
        } else {

            //on affiche un message d'erreur
            $erreur = !empty($_POST) ? "Le formulaire n'a pas été correctement rempli" : "";
        }

        //on instancie le model pour récupérer les informations de la création 
        $creations = new CreationModel();
        $creation = $creations->find($id);

        //on renvoie vers la vue le formulaire de mise à jour et le message d'erreur potentiel
        $this->render('creation/updateCreation', ["erreur" => $erreur, "creation" => $creation, "submit" => "Modifier"]);
    }

    //méthode pour la suppression d'une création
    public function deleteCreation($id)
    {
        if (isset($_POST['true'])) {
            //on instancie la classe Creation Model pour exécuter la suppression avec la méthode delete()
            //en récupérant l'id de la création du lien "OUI"
            $creations = new CreationModel();
            $message = $creations->delete($id);
            $message = ($message) ? "true" : "false";
            //on redirige l'utilisateur vers la liste des créations
            $this->redirectedToRoute('creation', 'index', $message);
        } elseif (isset($_POST['false'])) {

            //on redirige l'utilisateur vers la liste des créations
            $this->redirectedToRoute('creation', 'index');
        } else {
            //on récupére la création avec la méthode find()
            $creations = new CreationModel();
            $creation = $creations->find($id);
        }
        //on renvoie vers la vue la création sélectionnée
        $this->render('creation/deleteCreation', ["creation" => $creation]);
    }
}
