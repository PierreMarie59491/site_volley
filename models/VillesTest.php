<?php
// VillesTest.php

require_once("Villes.php");// Appel de la classe Villes

// Instanciation d'un objet et utilisation (new Objet(attribut1, attribut2, attribut3, etc))
$lille = new Villes(59000, "Lille", 033);
//On récupère les valeurs des paramètres et on les affectent aux valeurs arguments
echo $lille->getCp() . ", " //On récupère les valeurs des paramètres et on les affichent avec echo
    . $lille->getNomVille() . ", "
    // . $lille->getSite() . ","
    // . $lille->getPhoto() . ","
    . $lille->getIdVille() .  "<br>";


$caen = new Villes(14000, "Caen", 033);

echo $caen->getCp() . ", "
. $caen->getNomVille() . ", "
// . $caen->getSite() . ","
// . $caen->getPhoto() . ","
. $caen->getIdVille() .  "<br>";

$paris = new Villes(75000, "Paris", 033);

echo $paris->getCp() . ", "
    . $paris->getNomVille() . ", "
    // . $paris->getSite() . ","
    // . $paris->getPhoto() . ","
    . $paris->getIdVille() .  "<br>";