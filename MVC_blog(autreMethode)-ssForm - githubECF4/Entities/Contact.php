<?php

namespace App\Entities;

class Contact
{
    private $id_contact;
    private $nom;
    private $email;
    private $message;


    /**
     * Get the value of id_contact
     */
    public function getId_contact()
    {
        return $this->id_contact;
    }

    /**
     * Set the value of id_contact
     *
     * @return  self
     */
    public function setId_contact($id_contact)
    {
        $this->id_contact = $id_contact;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
