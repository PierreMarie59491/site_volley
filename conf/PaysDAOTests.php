<?php

/*
  PaysDAOTests.php
 */

require_once './ConnectionDB.php';
require_once '../entities/Pays.php';
require_once './PaysDAO.php';

try {
    // Connexion
    $cnx = new ConnectionDB();
    $pdo = $cnx->getConnection("../conf/projetPersoVolley.ini");

    $dao = new PaysDAO($pdo);

    /*
     * TEST DU SELECT ALL
     */
//    echo "<hr>SELECT ALL<hr>";
//    $t = $dao->selectAll($pdo);
//    echo "<pre>";
//    var_dump($t);
//    echo "</pre>";

    /*
     * TEST DU SELECT ONE
     */
    echo "<hr>SELECT ONE<hr>";
    $objet = $dao->selectOne("RU");
    echo "<pre>";
    var_dump($objet);
    echo "</pre>";

    $russie = new Pays("RU", "Russie");

    /*
     * TEST DE L'INSERT
     */
//    echo "<hr>INSERT<hr>";  
//    $affected = $dao->insert($russie);
//    echo "Insertion : $affected";

    /*
     * TEST DU DELETE
     */
    echo "<hr>DELETE<hr>";
    $affected = $dao->delete($russie);
    echo "Suppression : $affected";

    /*
     * TEST DE L'UPDATE
     */
    echo "<hr>UPDATE<hr>";
    $russie->setNomPays("RUSSIA");
    $affected = $dao->update($russie);
    echo "Modification : $affected";

    /*
     * TEST DU SELECT ALL
     */
    echo "<hr>SELECT ALL<hr>";
    $t = $dao->selectAll();
    echo "<pre>";
    var_dump($t);
    echo "</pre>";
    $affected = "13";
    for ($i = 0; $i < count($t); $i++) {
        echo "<br>" . $t[$i]->getIdPays() . " - " . $t[$i]->getNomPays();
    }

    $pdo = null;
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
?>
