<?php

/*
 * ConnectionDBTest.php
 * Utilisation de cours.ini
 */

require './ConnectionDB.php';

// Create a instance of ConnectionDB class so a object
$cnx = new ConnectionDB();
// Execution of the getConnection method
$pdo = $cnx->getConnection("../conf/projetPersoVolley.ini");
// Display the object
var_dump($pdo);
?>
