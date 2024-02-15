<?php

// ConnectionDB.php
class ConnectionDB {

    /**
     * 
     * @param string $iniFile
     * @return PDO
     */
    public function getConnection(string $iniFile): PDO {
        $pdo = null;
        // try because input/output managment
        try {
            // Analyse file properties
            $tProprietes = parse_ini_file($iniFile);

            // Récupération une à une des valeurs des clés du tableau associatif
            $host = $tProprietes["serveur"];
            $db = $tProprietes["db"];
            $user = $tProprietes["user"];
            $pwd = $tProprietes["pwd"];

            // Create a instance of connection
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            // Variuos parameters 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $e) {
            // In case of error
            echo $e; // Only in development period !
            $pdo = null;
        }
        // The value return to the call function
        return $pdo;
    }

}

?>
