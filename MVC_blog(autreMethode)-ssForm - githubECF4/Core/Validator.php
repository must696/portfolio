<?php

namespace App\Core;

class Validator
{
    //Méthode permettant de tester les champs. Les paramètres représentent les valeurs en POST et le nom des champs
    public static function validatePost(array $post, array $fields): bool
    {

        // Chaque champ est parcouru
        foreach ($fields as $field) {
            // on teste si les champs sont vides ou non présents
            if (empty($post[$field]) || !isset($post[$field])) {
                return false;
            }
        }
        return true;
    }

    //Méthode permettant de tester les champs. Les paramètres représentent les valeurs en FILES et le nom des champs
    public static function validateFiles(array $files, array $fields): bool
    {

        // Chaque champ est parcouru
        foreach ($fields as $field) {
            // on teste si les champs sont déclarés et sans erreur
            if (isset($files[$field]) && $files[$field]['error'] == 0) {
                return true;
            }
        }
        return false;
    }
}
