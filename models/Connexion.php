<?php

/*
 * Connexion.php
 */

/**
 * Description of Connexion
 *
 * @author Administrateur
 */
class Connexion {

    public function seConnecter(string $path): PDO {
        $pdo = null;
        try {
            $tProprietes = parse_ini_file("../conf/projetPersoVolley.ini");

            // Récupération une à une des valeurs des clés du tableau associatif
            $host = $tProprietes["serveur"];
            $db = $tProprietes["db"];
            $user = $tProprietes["user"];
            $pwd = $tProprietes["pwd"];

            // Utilisation des variables dans le DSN et les autres paramètres
            $pdo = new PDO("mysql:host=$host;port=3306;dbname=$db;", $user, $pwd);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $pdo;
    }
}