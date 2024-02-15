<?php
function seConnecter(string $psCheminParametresConnexion): PDO
{

    $tProprietes = parse_ini_file($psCheminParametresConnexion);

    $protocole = $tProprietes["protocole"];
    $serveur = $tProprietes["serveur"];
    $port = $tProprietes["port"];
    $user = $tProprietes["user"];
    $pwd = $tProprietes["pwd"];
    $db = $tProprietes["db"];

    /*
     * Connexion
     */
    try {
        $pdo = new PDO("$protocole:host=$serveur;port=$port;dbname=$db;", $user, $pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $pdo->exec("SET NAMES 'UTF8'");
    } catch (PDOException $ex) {
        //echo "<br>" .   $ex->getMessage();
    }
    return $pdo;
}

//FCT DECONNEXION
// seDeconnecter() : void
function seDeconnecter(PDO &$pdo)
{
    $pdo = null;
}
/*
 * VillesDAO.php
 */

/**
 *
 * @param PDO $pdo
 * @param array $tAttributesValues
 * @return int
 */
function insert(PDO $pdo, array $tAttributesValues): int {
    $affected = 0;
    try {
        $sql = "INSERT INTO villes(code_postal,nom_ville,site,photo) VALUES(?,?,?,?)";
        $statement = $pdo->prepare($sql);

//        $statement->bindValue(1, $tAttributesValues["cp"]);
//        $statement->bindValue(2, $tAttributesValues["nom_ville"]);
//        $statement->bindValue(3, $tAttributesValues["id_pays"]);
//        $statement->execute();
        $statement->execute(array_values($tAttributesValues));
        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        echo $e->getMessage();
        $affected = -1;
    }
    return $affected;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @return int
 */
function delete(PDO $pdo, string $id): int {
    $affected = 0;
    try {
        $sql = "DELETE FROM villes WHERE id_villes = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}

function update(PDO $pdo, array $data, string $id): int {
    $affected = 0;

    try {
        $sql = "UPDATE villes SET nom_ville=?, site=?, photo=?, id_pays=?  WHERE cp=?";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $data["nom_ville"]);
        $statement->bindValue(2, $data["site"]);
        $statement->bindValue(3, $data["photo"]);
        $statement->bindValue(4, $data["id_pays"]);
        $statement->bindValue(5, $id);

        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        $affected = -1;
    }

    return $affected;
}

/**
 *
 * @param PDO $pdo
 * @return array
 */
function selectAll(PDO $pdo): array {
    /*
     * Renvoie un tableau ordinal de tableaux associatifs
     */
    $list = array();//tous les enregistrements de la table villes avec les noms de colonne
    try {
        $cursor = $pdo->query("SELECT * FROM villes");
        // Renvoie un tableau ordinal de tableaux associatifs
        $list = $cursor->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = array("message" => $e->getMessage());
        $list[] = $message;
    }
    return $list;
}

function selectOne(PDO $pdo, string $id): array {
    /*
     * Renvoie un tableau associatif
     */
    
    try {
        $sql = "SELECT * FROM villes WHERE cp = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id);
        $cursor->execute();
        // Renvoie un tableau associatif
        $line = $cursor->fetch(PDO::FETCH_ASSOC);//un enregistrement de la table "ville" sous forme de tableau à clef
        if ($line === FALSE) {//la ligne retrouvée est vide ou nulle
            $line["message"] = "Enregistrement inexistant !";
        }
        $cursor->closeCursor();
    } catch (PDOException $e) {
        //$line["Error"] = $e->getMessage();
        $line["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD, monsieur Antonino !!!";
    }
    return $line;
}