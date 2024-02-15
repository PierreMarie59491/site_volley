<?php

declare(strict_types=1);
//L'INSERT

// Rôle du contrôleur : gérer les requêtes htt^(request response)


//Chargement des fichiers annexes 'require_once'
require_once '../daos/VillesVolleyDAOPoo.php';
require_once '../models/Villes.php';
require_once '../models/Connexion.php';


$insert = FILTER_INPUT(INPUT_POST, 'insertbt');
if ($insert != null) {
    // Récupération des valeurs saisies dans le formulaire
    // $idVille = FILTER_INPUT(INPUT_POST, 'id_ville');
    $nomVille = FILTER_INPUT(INPUT_POST, 'nom_ville');
    $cp = FILTER_INPUT(INPUT_POST, 'cp');
    $insert = FILTER_INPUT(INPUT_POST, 'insertbt');
    //Contrôler la qualité des valeurs saisies dans le formulaire
    // Expression régulière pour savoir si c'est un nombre entier (un int)


    // On instancie l'objet Villes en valorisant les attributs cp et nomVille
    $villes = new Villes(0, $cp, $nomVille);
    // $Nomvilles= new Villes($nomVille);
    // $Cp= new Villes($cp);


    // Connexion à la BD
    $cnx = new Connexion();
    // $tx = new Transaxion();

    $pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
    // $tx->initialiser($pdo);


    // On instancie un objet DAO (VillesDAO, ici)
    // Instanciation du DAO
    $dao = new VillesDAOPoo($pdo);

    if ($insert != null) {
        //On sollicite la méthode DELETE du DAOPoo et on récupère le nombre de lignes ajoutée(s)
        $affected = $dao->insert($villes);

        // On créé l'IHM : 
        echo $inserted = $affected . "lignes ajoutée(s)<br>";
    }
}

//Fin Insert

// LE DELETE
// Rôle du contrôleur : gérer les requêtes htt^(request response)
$idVille = 0;
$delete = filter_input(INPUT_POST, "deletebt");
if ($delete != null) {
    // if ($idVille!= null){

    // Récupération des valeurs saisies dans le formulaire
    $idVille = FILTER_INPUT(INPUT_POST, 'id_ville');
    // }
}
//Contrôler la qualité des valeurs saisies dans le formulaire
// Expression régulière pour savoir si c'est un nombre entier (un int)


// On instancie l'objet Villes en valorisant l'attribut id_ville
$ville = new Villes($idVille);

// Connexion à la BD
$cnx = new Connexion();
// $tx = new Transaxion();

$pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
// $tx->initialiser($pdo);


// On instancie un objet DAO (VillesDAO, ici)
// Instanciation du DAO
$dao = new VillesDAOPoo($pdo);

// $delete = filter_input(INPUT_POST, "deletebt");
// if ($delete!=null) {
//On sollicite la méthode DELETE du DAOPoo et on récupère le nombre de lignes supprimées
$affected = $dao->delete($ville);

// On créé l'IHM : 
$deleted = $affected . "lignes supprimées<br>";
echo $deleted;

//Fin DELETE

// Le selectALL

// Connexion à la BD
$cnx = new Connexion();
// $tx = new Transaxion();

$pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
// $tx->initialiser($pdo);


// On instancie un objet DAO (VillesDAOPoo, ici)
// Instanciation du DAO
$dao = new VillesDAOPoo($pdo);
/*
 * SELECT ALL
 */
// echo "<hr>SELECT ALL<br>";
$t = $dao->selectAll();
$contenu = "";
foreach ($t as $objet)
// Methode alternative 
// {
//     echo "<tr>" . "<td>" . $objet->getIdVille() . "</td>"  
//      . "<td>" . $objet->getCp() . "</td>"
//      . "<td>" . $objet->getNomVille() . "</td>" . "</tr>" . "<br>";
// }

{
    $contenu .= "<tr>";
    $contenu .= "<td>" . $objet->getIdVille() . "</td>";
    $contenu .= "<td>" . $objet->getCp() . "</td>";
    $contenu .= "<td>" . $objet->getNomVille() . "</td>";
    $contenu .= "<td>" . "<a href='CRUDCTRLOo.php?action=delete&id_ville=" . $objet->getIdVille() . "'><img src='../icons/trash.jpg' width='10vw'></a>" . "</td>";
    $contenu .= "<td>" . "<a href='CRUDCTRLOo.php?action=update&id_ville=" . $objet->getIdVille() . "'><img src='../icons/modify.jpg' width='10vw'>" . "</td>";
    $contenu .= "</tr>";
}

// seDeconnecter($pdo);
// FILTER INPUT COMMUN DELETE ET UPDATE

$action = filter_input(INPUT_GET, 'action');
$idVille = intval(filter_input(INPUT_GET, "id_ville"));

if ($action == "update") {
    $update = 1;
    $delete = 0;
} else if ($action == "delete") {
    $update = 0;
    $delete = 1;
} else {
    $update = 0;
    $delete = 0;
}

echo "update = $update <br>";
echo "delete = $delete <br>";

//FIN selectALL
// DELETE

$messageDelete = "";

if ($delete === 1 && $idVille !=null){
    $villeDelete = new Villes($idVille);

    $messageDelete = $dao->delete($villeDelete) . " supression faite";
}

echo $messageDelete;


//L'UPDATE
$idsVille = 0;

// Je récupère la valeur de mon input id_ville
$idsVille = filter_input(INPUT_POST, "id_ville");
// Je convertie mon input "string" en int
$idsVille = intval($idsVille);
$idSelect = "";

// on essaie de travailler avec la BD
try {
    // On instancie l'objet Villes en valorisant l'attribut id_ville
    $ville = new Villes($idsVille);

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

// echo "<hr>selectOne<hr>";

$line = $dao->selectOne($idVille);
$selectId = $line->getIdVille();
$selectVille = $line->getNomVille();
$selectCp = $line->getCp();
// var_dump($line);
echo $selectId;
echo $selectCp;
echo $selectVille;

/*
 * CALL UPDATE
 */
// echo "<hr>UPDATE<hr>";

$updateName = filter_input(INPUT_POST, "nom_ville");
$updateName = strval($updateName);
$cpUpdate = filter_input(INPUT_POST, "cp");
$cpUpdate = strval($cpUpdate);
// $pk = intval("id_ville");
if ($updateName && $cpUpdate != null) {
    // var_dump($cpUpdate);
    // $data = array("cp" => $cpUpdate, "nom_ville" => $updateName);
    $ville = new Villes($idVille, $cpUpdate, $updateName);
    // $ville = new Villes($idVille, $cpUpdate, $updateName);
    $update = $dao->update($ville);

    echo $update;
}

include "../views/CRUDIHMOo.php";
