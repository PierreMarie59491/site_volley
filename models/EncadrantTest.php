<?php
// EncadrantTest.php

require_once("Encadrant.php");

// Instanciation d'un objet et utilisation (new Objet(attribut1, attribut2, attribut3, etc))
$Pierre = new Encadrant(2, "Marie", "Pierre", 1633181);
//On récupère les valeurs des paramètres et on les affectent aux valeurs arguments
echo "l'endarant n° :" .  $Pierre->getIdEncadrant() . ", "
    . "nommée : " . $Pierre->getPrenomEncadrant() . " " . $Pierre->getNomEncadrant()
    . " avec le n° de Licence : " . $Pierre->getNumLicence() . "<br>";


$Erik = new Encadrant(1, "Milowski", "Erik", 48798);

echo "l'endarant n° :" .  $Erik->getIdEncadrant() . ", "
    . "nommée : " . $Erik->getPrenomEncadrant() . " " . $Erik->getNomEncadrant()
    . " avec le n° de Licence : " . $Erik->getNumLicence() . "<br>";

$Simon = new Encadrant(3, "Ducouret", "Simon", 4);

echo "l'endarant n° :" .  $Simon->getIdEncadrant() . ", "
    . "nommée : " . $Simon->getPrenomEncadrant() . " " . $Simon->getNomEncadrant()
    . " avec le n° de Licence : " . $Simon->getNumLicence() . "<br>";