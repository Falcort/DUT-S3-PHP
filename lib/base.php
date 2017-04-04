<?php

/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

class base
{

    //Constructeur
    function __construct()
    {
        session_name('p1502280');
        session_start();
    }

    //Destructeur
    public function __destruct()
    {

    }

    ///// Sanitize string /////
    // Fonction qui nettoie, pareil au html_specialchar du prof
    private function clean($string)
    {
        $string = str_replace(' ', '-', $string); // On remplace les " " avec des "-"

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // On supprime tout les chars spéciaux
    }

    // isAlpha même que le prof sauf que j'utilise ma fonction clean à moi
    public static function isAlpha($string)
    {
        if (isset($string) && $string != '' && is_string($string) && !preg_match('/[\W]+/', $string) == 1) {
            return htmlspecialchars($string);
        }
        return false;
    }
}


?>
