<?php

/*
  LE DAO de la table [pays] de la BD [cours]
 */

/*
 * PaysDAO.php
 * 
 * selectAll(PDO) : tableau ordinal d'objets Pays
 * selectOne(PDO, pk) : objet Pays
 * insert(PDO, Objet Pays) : int (affected)
 * delete(PDO, Objet Pays) : int (affected)
 * update(PDO, Objet Pays) : int (affected)
 */

require_once '../entities/Pays.php';

class PaysDAO {

    const TABLE_NAME = "pays";
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * 
     * @param PDO $pdo
     * @return array of objects
     */
    public function selectAll(): array {
        /*
         * Renvoie un tableau ordinal d'objets Pays
         */
        $result = array();
        try {
//            $cursor = $pdo->query("SELECT * FROM pays");
//            // Renvoie un tableau ordinal de tableaux associatifs
//            $list = $cursor->fetchAll();
//            for ($i = 0; $i < count($list); $i++) {
//                $pays = new Pays($list[$i]["id_pays"], $list[$i]["nom_pays"]);
//                $result[] = $pays;
//            }
            $cursor = $this->pdo->query("SELECT id_pays AS idPays, nom_pays AS nomPays FROM " . self::TABLE_NAME . " ORDER BY nomPays");
            $result = $cursor->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pays");
        } catch (PDOException $e) {
            $pays = new Pays("-1", $e->getMessage());
            $result[] = $pays;
        }
        return $result;
    }

    /**
     * 
     * @param 
     * @param string $id
     * @return Pays
     */
    public function selectOne(string $id): Pays {
        /*
         * Renvoie un objet Pays
         */
        $pays = new Pays();
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . "  WHERE id_pays = ?";
            $cursor = $this->pdo->prepare($sql);
            $cursor->bindValue(1, $id);
            $cursor->execute();
            // Renvoie un tableau associatif
            $line = $cursor->fetch(PDO::FETCH_ASSOC);
            if ($line === FALSE) {
                $pays->setIdPays(0);
                $pays->setNomPays("Enregistrement inexistant !");
            } else {
                $pays->setIdPays($line["id_pays"]);
                $pays->setNomPays($line["nom_pays"]);
            }

            $cursor->closeCursor();
        } catch (PDOException $e) {
            $pays->setIdPays(-1);
            $pays->setNomPays("Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD, monsieur Antonino !!!");
        }
        return $pays;
    }

    /**
     * 
     * @param 
     * @param Pays $pays
     * @return int
     */
    public function insert(Pays $pays): int {
        /*
         * Renvoie un INT (affected)
         */
        $affected = 0;
        try {
            $sql = "INSERT INTO " . self::TABLE_NAME . "(id_pays, nom_pays) VALUES(?,?)";
            $statement = $this->pdo->prepare($sql);

            $statement->bindValue(1, $pays->getIdPays());
            $statement->bindValue(2, $pays->getNomPays());

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
            echo $e->getMessage();
        }
        return $affected;
    }

    /**
     * 
     * @param 
     * @param Pays $pays
     * @return int
     */
    public function delete(Pays $pays): int {
        /*
         * Renvoie un INT (affected)
         */
        $affected = 0;
        try {
            $sql = "DELETE FROM  " . self::TABLE_NAME . "  WHERE id_pays = ?";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $pays->getIdPays());
            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Pays $pays
     * @return int
     */
    public function update(Pays $pays): int {
        /*
         * Renvoie un INT (affected)
         */
        $affected = 0;
        try {
            $sql = "UPDATE " . self::TABLE_NAME . " SET nom_pays = ? WHERE id_pays = ?";
            $statement = $this->pdo->prepare($sql);

            $statement->bindValue(1, $pays->getNomPays());
            $statement->bindValue(2, $pays->getIdPays());

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

}

?>
