<?php
/*
  PaysSelectFromMySQL.php
  SELECT id_pays, nom_pays FROM pays
  Pour tester le code PHP
  http://localhost/PourFrontJS/php/PaysSelectFromMySQL.php
  localhost ou pascalbuguet.alwaysdata.net pour AD
 */
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

try {
    // mysql-pascalbuguet.alwaysdata.net pour le host sur AD
    $pdo = new PDO("mysql:host=mysql-pierrem2i.alwaysdata.net;dbname=pierrem2i_projetpersovolley", "pierrem2i", "Piotre14!");
    // $pdo = new PDO("mysql:host=127.0.0.1", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    $sql = "SELECT id_pays, nom_pays FROM pays";
    $cursor = $pdo->prepare($sql);
    $cursor->execute();
    $records = $cursor->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
} catch (PDOException $e) {
    $records = array();
    $message = array();
    $message["id_pays"] = "-1";
    $message["nom_pays"] = $e->getMessage();
    $records[] = $message;
}
echo json_encode($records);
