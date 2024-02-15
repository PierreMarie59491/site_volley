<?php

/*
 * AdherentInsertMySQLPOSTV2.php
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

// Récupère un flux de caractères  envoyé par le client au format JSON
// Dans le cas présent, 13 valeurs exemple : {"civilite":H}
$objetJSON = file_get_contents("php://input");
// json_decode() : string -> tableau | objet
// TRUE = Tableau associatif
// FALSE = OBJET JSON
$tableauAdherent = json_decode($objetJSON, TRUE);//On récupère les arguments de l'objet JSON adherent créé 
// en Javascript et envoyé dans le BODY de la requête HTTP
$civilite = $tableauAdherent["civilite"];
$nom = $tableauAdherent["nom"];
$prenom = $tableauAdherent["prenom"];
$pseudo = $tableauAdherent["pseudo"];
$motDePasse = $tableauAdherent["motDePasse"];
$numLicence = $tableauAdherent["numLicence"];
$telAdherent = $tableauAdherent["telAdherent"];
$adresse = $tableauAdherent["adresse"];
$email = $tableauAdherent["email"];
$dateDeNaissance = $tableauAdherent["dateDeNaissance"];
$idEquipe = $tableauAdherent["idEquipe"];
$idEncadrant = $tableauAdherent["idEncadrant"];
$idVille = $tableauAdherent["idVille"];

try {
    /*
     * Connexion
     */
    // $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=cours;", "root", "");
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=projetpersovolleyball;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    /*
     * INSERTION
     */
    $sql = "INSERT INTO adherent(civilite, nom, prenom, pseudo, mot_de_passe, num_licence, tel_adherent, adresse, email, dateDeNaissance, id_equipe, id_encadrant, id_ville) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $cmd = $pdo->prepare($sql);
    $cmd->bindParam(1, $civilite);
    $cmd->bindParam(2, $nom);
    $cmd->bindParam(3, $prenom);
    $cmd->bindParam(4, $pseudo);
    $cmd->bindParam(5, $motDePasse);
    $cmd->bindParam(6, $numLicence);
    $cmd->bindParam(7, $telAdherent);
    $cmd->bindParam(8, $adresse);
    $cmd->bindParam(9, $email);
    $cmd->bindParam(10, $dateDeNaissance);
    $cmd->bindParam(11, $idEquipe);
    $cmd->bindParam(12, $idEncadrant);
    $cmd->bindParam(13, $idVille);

    $cmd->execute();

    $tMessage = array();
    $tMessage["message"] = $cmd->rowcount() . " enregistrement(s) ajouté(s)";
    $pdo = null;
} catch (PDOException $e) {
    $tMessage = array();
    $tMessage["message"] = $e->getMessage();
}

echo json_encode($tMessage);
?>