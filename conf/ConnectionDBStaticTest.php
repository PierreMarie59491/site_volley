<?php

/*
 * ConnectionDBStaticTest.php
 * Utilisation de cours.ini
 */

require './ConnectionDBStatic.php';
// NO instantiation
// Create a instance of ConnectionDB class so a object
// $cnx = new ConnectionDB();
// Execution of the STATIC getConnection method
// SYNTAX : ClassName::methodName
$pdo = ConnectionDBStatic::getConnection("../conf/projetPersoVolley.ini");
// Display the object
var_dump($pdo);
?>
