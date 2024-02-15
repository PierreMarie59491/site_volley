<?php
declare (strict_types = 1);
require_once "../daos/villesVolleyDAOPoo.php";
require_once '../models/Villes.php';
require_once '../models/Connexion.php';
header("Content-Type: text/html; charset=UTF-8");

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
echo "<hr>SELECT ALL<br>";
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
    $contenu .= "</tr>";
}

seDeconnecter($pdo);

include '../views/villesSelectAllIHMOo.php';
?>
