<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Contact;

class ContactModel extends DbConnect
{
    // envoyer les données vers la BD
    public function create(Contact $contact)
    {

        $this->request = $this->connection->prepare("INSERT INTO contact VALUES (NULL, :nom, :email, :message)");
        $this->request->bindValue(":nom", $contact->getNom());
        $this->request->bindValue(":email", $contact->getEmail());
        $this->request->bindValue(":message", $contact->getMessage());
        $message = $this->executeTryCatch();
        return $message;
    }
    private function executeTryCatch()
    {
        try {
            $message = $this->request->execute();
            return $message;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // Ferme le curseur, permettant à la requête d'être de nouveau exécutée
        $this->request->closeCursor();
    }
}
