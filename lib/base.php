<?php
/* Classe contenant toutes les fonctions de base du Site
 * Copyright (c) Thibault Souquet, Jennifer Martinez, w3schools....
 *
 */

    class base {

        function __construct()
        {
            session_name('p1502280');
            session_start();
        }

        public function __destruct()
        {

        }

        ///// Sanitize string /////
        private function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }

        public static function isAlpha($string)
        {
            if(isset($string) && $string!='' && is_string($string) && !preg_match('/[\W]+/', $string)==1)
            {
                return htmlspecialchars($string);
            }
            return false;
        }
    }



 ?>
