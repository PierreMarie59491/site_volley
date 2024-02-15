<?php

/*
 * InscriptionCTRL.php
 */

/*
  INPUTS
 */

$civilite = filter_input(INPUT_GET, "civilite");
$nom = trim(filter_input(INPUT_GET, "nom"));
$prenom = trim(filter_input(INPUT_GET, "prénom"));
$dateNaissance = filter_input(INPUT_GET, "dateNaissance");
$email1 = trim(filter_input(INPUT_GET, "email1"));
$email2 = trim(filter_input(INPUT_GET, "email2"));
$pseudo = trim(filter_input(INPUT_GET, "pseudo"));
$mdp1 = trim(filter_input(INPUT_GET, "mdp1"));
$mdp2 = trim(filter_input(INPUT_GET, "mdp2"));
$cv = trim(filter_input(INPUT_GET, "cv"));
$adresse = trim(filter_input(INPUT_GET, "adresse"));
$cp = filter_input(INPUT_GET, "cp");
$hobbies = filter_input(INPUT_GET, 'hobbies', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$newsletter = filter_input(INPUT_GET, "newsletter");

/*
  TRT
 */
$messageOK = "";
$messageKO = "";

if ($civilite == null) {
    $messageKO .= "<br/>Civilité incorrecte";
} 
else {
    $messageOK .= "<br/>Civilité : $civilite";
}

if ($nom == null) {
    $messageKO .= "<br/>Nom incorrect";
}elseif (!preg_match("/^[A-Za-zÀ-ÿ \- ]{0,30}$/", $nom)) {
    $messageKO = "Le format du nom n'est pas valide !";
} 
else {
    $messageOK .= "<br/>Nom : $nom";
}

if ($prenom == null) {
    $messageKO .= "<br/>Prénom incorrect";
} elseif (!preg_match("/^[A-Za-zÀ-ÿ \- ]{0,30}$/", $prenom)) {
    $messageKO = "Le format du prenom n'est pas valide !";
} else {
    $messageOK .= "<br/>Prénom : $prenom";
}

if ($dateNaissance == null) {
    $messageKO .= "<br/>Date de naissance incorrecte";
} else {
    $messageOK .= "<br/>Date de naissance : $dateNaissance";
}

if ($email1 == null) {
    $messageKO .= "<br/>E-mail l incorrect";
} else {
    $messageOK .= "<br/>E-mail 1 : $email1";
}

if ($email2 == null || $email2 != $email1) {
    $messageKO .= "<br/>E-mail 2 incorrect ou différent de email 1";
} else {
    $messageOK .= "<br/>E-mail : $email2";
}

if ($mdp1 == null) {
    $messageKO .= "<br/>MDP 1 incorrect";
} else {
    $messageOK .= "<br/>MDP 1 : $mdp1";
}

if ($mdp2 == null || $mdp2 != $mdp1) {
    $messageKO .= "<br/>Mdp 2 incorrect ou différent de mdp 1";
} else {
    $messageOK .= "<br/>MDP 2 : $mdp2";
}

if ($cv == null) {
    $messageKO .= "<br/>CV incorrect";
} else {
    $messageOK .= "<br/>CV : $cv";
}

if ($adresse == null) {
    $messageKO .= "<br/>Adresse incorrecte";
} else {
    $messageOK .= "<br/>Adresse : $adresse";
}

if ($cp == "0") {
    $messageKO .= "<br/>Saisissez une ville";
} else {
    $messageOK .= "<br/>CP : $cp";
}

//echo "<pre>";
//var_dump($hobbies);
//echo "</pre>";
if ($hobbies == null) {
    $messageOK .= "<br/>Pas de hobbies";
//    echo "<pre>";
//    var_dump($hobbies);
//    echo "</pre>";
} else {
    $hobbies = implode("-", $hobbies);
//    echo "<pre>";
//    var_dump($hobbies);
//    echo "</pre>";
    $messageOK .= "<br/>Hobbies : $hobbies";
}

if ($newsletter == null) {
    $messageOK .= "<br/>Pas de news letter<br>";
} else {
    $messageOK .= "<br/>Abonné(e) à la news letter";
}
echo $messageOK;
echo $messageKO;

/*
  OUPUTS
 */

//echo "<hr/>$messageKO<hr/>";
//echo "<hr/>$messageOK<hr/>";

include '../views/InscriptionViewmoi.php';
?>