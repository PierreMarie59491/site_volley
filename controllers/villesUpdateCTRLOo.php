<?php

declare(strict_types=1);
require_once '../daos/VillesVolleyDAOPoo.php';
require_once '../models/Villes.php';
require_once '../models/Connexion.php';
header("Content-Type: text/html; charset=UTF-8");
$idVille = 0;

// Je récupère la valeur de mon input id_ville
$idVille = filter_input(INPUT_POST, "id_ville");
// Je convertie mon input "string" en int
$idVille = intval($idVille);
$idSelect = "";

// on essaie de travailler avec la BD
try {
    // On instancie l'objet Villes en valorisant l'attribut id_ville
    $ville = new Villes($idVille);

    // Connexion à la BD
    $cnx = new Connexion();
    $pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
    $dao = new VillesDAOPoo($pdo);
    // // Connexion
    // $pdo = new PDO("mysql:host=localhost;port=3306;dbname=cours", "root", "");
    // // Les erreurs sont gérées comme des exceptions
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // // bd <-> TUYAU <-> page
    // $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT * FROM villes";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $idSelect .= "<option value='$enregistrement[0]'>$enregistrement[2]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message = 'Echec de l\'exécution : ' . $e->getMessage();
}




// CALL SELECT_ONE

echo "<hr>selectOne<hr>";

$line = $dao->selectOne($idVille);
$selectId = $line->getIdVille();
$selectVille = $line->getNomVille();
$selectCp = $line->getCp();
var_dump($line);
echo $selectId;
echo $selectCp;
echo $selectVille;

/*
 * CALL UPDATE
 */
echo "<hr>UPDATE<hr>";

$updateName = filter_input(INPUT_POST, "nom_ville");
$updateName = strval($updateName);
$cpUpdate = filter_input(INPUT_POST, "cp");
$cpUpdate = strval($cpUpdate);
// $pk = intval("id_ville");
if ($updateName && $cpUpdate!=null) {
// var_dump($cpUpdate);
// $data = array("cp" => $cpUpdate, "nom_ville" => $updateName);
$ville = new Villes($idVille, $cpUpdate, $updateName);
// $ville = new Villes($idVille, $cpUpdate, $updateName);
$update = $dao->update($ville);

echo $update;

}else {
echo "Tous les champs sont obligatoires";
}
include "../views/villesUpdateIHMOo.php";
