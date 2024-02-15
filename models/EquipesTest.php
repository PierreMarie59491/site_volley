<?php
// EquipesTest.php

require_once("Equipes.php");

// Instanciation d'un objet et utilisation (new Objet(attribut1, attribut2, attribut3, etc))
$france = new Equipes(1, "1MD", 1);
//On récupère les valeurs des paramètres et on les affectent aux valeurs arguments
echo "L'équipe :" .  $france->getIdEquipe() . ", "
    . "nommée : " . $france->getNomEquipe() . ", "
    . "avec l'endarant n° : "
    . $france->getIdEncadrant() .   "<br>";


$italie = new Equipes(2, "1FD", 3);

echo "L'équipe :" .  $italie->getIdEquipe() . ", "
    . "nommée : " . $italie->getNomEquipe() . ", "
    . "avec l'endarant n° : " . $italie->getIdEncadrant() .   "<br>";

$espagne = new Equipes(3, "Loisir", 4);

echo "L'équipe :" . $espagne->getIdEquipe() . ", "
    . "nommée : " .  $espagne->getNomEquipe() . ", "
    . "avec l'endarant n° : " . $espagne->getIdEncadrant() .   "<br>";
