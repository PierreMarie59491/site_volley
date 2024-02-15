<?php

/*
 * AdherentInsertMySQLPOSTV2.php
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

// Récupère un flux de caractères
$data = file_get_contents("php://input");
// json_decode() : string -> tableau | objet
// TRUE = Tableau associatif
// FALSE = OBJET JSON
$data = json_decode($data, TRUE); //On récupère les arguments de l'objet adherent

$emailSelect="";

$motDePasse = $data["motDePasse"];
$email = $data["email"];
try {
    /*
     * Connexion
     */
    // $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=cours;", "root", "");
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=projetpersovolleyball;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT email, tel_adherent FROM adherent";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $emailSelect .= "<option value='$enregistrement[0]'>$enregistrement[1]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message["message"] = $e->getMessage();
    // return $emailSelect;
}

try {
    /*
     * Connexion
     */
    // $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=cours;", "root", "");
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=projetpersovolleyball;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    /*
     * Suppression
     */
    $sql = "DELETE FROM adherent WHERE email = '$email' AND mot_de_passe = '$motDePasse'";
    $cmd = $pdo->prepare($sql);
    // $cmd->bindParam(1, $email);
    // $cmd->bindParam(2, $motDePasse);
    $cmd->execute();

    $tMessage = array();
    $tMessage["message"] = $cmd->rowcount() . " lignes supprimées";
    $pdo = null;
} catch (PDOException $e) {
    $tMessage = array();
    $tMessage["message"] = $e->getMessage();
}

echo json_encode($tMessage);
// include "AdherentDeleteFetchPOST.html";