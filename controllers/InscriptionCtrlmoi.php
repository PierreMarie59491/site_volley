<?php
$messageOK = "";
$messageKO = "";
//contrôle de la civilité//
$civilite = filter_input(INPUT_GET, 'civilite'); //récupération des inputs
; //m	
if ($civilite == 'monsieur' ) { //traitement
    echo "Monsieur<br>"; //output
} else 
    if ($civilite == 'madame') {
    echo "Madame<br>"; //output
} else echo "Civilité KO !!!<br>";

//contrôle du nom//
$nom = filter_input(INPUT_GET, 'nom');
if ($nom == '' ) {
    echo "Nom KO !!!<br>";
} else echo "Nom : $nom<br>";

//contrôle du prénom//
$prenom = filter_input(INPUT_GET, 'prénom');
if ($prenom == '') {
    echo "Prénom KO!!!<br>";
} else echo "Prénom : $prenom<br>";

//contrôle de la date de naissance//
$datedn = filter_input(INPUT_GET, 'date_de_naissance');
if ($datedn == '') {
    echo "Date de naissance KO!!!<br>";
} else echo "Date de naissance : $datedn<br>";

//contrôle de l'email//
$email1 = filter_input(INPUT_GET, 'email1');
if ($email1 == '') {
    echo "Email KO!!!<br>";
} else echo "Email : $email1<br>";

//contrôle de m'eùail bis//

$email2 = filter_input(INPUT_GET, 'email2');
if ($email2 == $email1 && $email2 != '') {
    echo "Email OK<br>";
} else echo "Email KO<br>";

//contrôle du pseudo//

$pseudo = filter_input(INPUT_GET, 'pseudo');
if ($pseudo == '') {
    echo "Pseudo KO!!!<br>";
} else echo "Pseudo : $pseudo<br>";

//contrôle du mot de passe//
$mdp = filter_input(INPUT_GET, 'motDePasse1');
if ($mdp == '') {
    echo "PWD KO !!!<br>";
} else {
    echo "Mot de passe : $mdp<br>";
}
//contrôle du mot de passe//
$mdp2 = filter_input(INPUT_GET, 'motDePasse2');
if ($mdp2 == $mdp) {
    echo "Mot de passe OK<br>";
} else echo "PWD2 KO !!!<br>";

//contrôle du cv//
$cv = filter_input(INPUT_GET, 'cv');
if ($cv == '') {
    echo "CV KO!!!<br>";
} else echo "CV :'$cv'<br>";

//contrôle de l'adresse//
$adresse = filter_input(INPUT_GET, 'adresse');
if ($adresse == '') {
    echo "Adresse KO!!!<br>";
} else echo "Adresse : $adresse<br>";

//contrôle de la ville//
$ville = filter_input(INPUT_GET, 'ville');
if ($ville == 'select') {
    echo "Saisissez une ville !!!<br>";
} else echo "Ville : $ville<br>";

//contrôle des hobbies//marche pour un mais pas en multiple//
$hobbies = filter_input(INPUT_GET, 'hobbies', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if ($hobbies == null) {
    echo "Hobbies KO!!!<br>";
} else {
    $hobbies = implode("-", $hobbies);
    echo "Hobbies : $hobbies<br>";
}

//contrôle de la newsletter//
$newsletter = filter_input(INPUT_GET, 'newsLetter');
if ($newsletter != null) {
    echo "La News letter !!!<br>";
} else  echo "Newsletter KO!!!<br>";

include '../views/InscriptionViewmoi.php';

//déclaration de la variable de retour d'output//
