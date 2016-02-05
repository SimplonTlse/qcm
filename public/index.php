<?php
/*
cette page est le point d'entrée de notre application
c'est la seule page php visible du monde extérieur
*/

// ceci est  une constante; elle est ici utile pour simplifier les include et require
// et ne pas avoir à se questionner sur leur position par rapport à l'endoir ou ils sont inclus,
// on inclue à partir la racine de notre projet et voilà !
define('BASE', __DIR__ . '/../');

//le fichier contenant nos fonctions
require BASE . 'lib/functions.php';


//une fonction qui se trouve dans le fichier functions.php
router();

//et on ne ferme pas la balise php quand notre fichier ne contient pas de html
