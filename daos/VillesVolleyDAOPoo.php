<?php

declare(strict_types=1);
require_once "../models/Villes.php";
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
 * VillesVolleyDAOPoo.php
 */

/**
 *
 * @param PDO $pdo
 * @param array $tAttributesValues
 * @return int
 */

/*
 * VillesVolleyDAOPoo.php
 */
// PHP 8 full

// On charge le fichier
require_once '../models/Villes.php';

// Déclaration de la classe
class VillesDAOPoo
{

    // On déclare un attribut
    private PDO $pdo;

    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    /**
     * Déclaration de la méthode INSERT :: input : un objet pays , output : un numérique entier
     * @param Villes $villes
     * @return int
     */
    public function insert(Villes $villes): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;

        try {
            // Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO villes(code_postal, nom_ville) VALUES(?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Villes
            $cmd->bindValue(1, $villes->getCp());
            $cmd->bindValue(2, $villes->getNomVille());

            // On exécute la requête
            $cmd->execute();
            // Nombre de lignes affectées (0 ou 1)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            echo  $e->getMessage();
            $affected = -1;
        }

        // Le retour de la méthode (l'output)
        return $affected;
    }


    /**
     *
     * @param Villes $villes
     * @return int
     */
    public function delete(Villes $villes): int
    {
        /*
        * La methode DELETE a uun seul argument qui est l'objet à gérer
        * Elle renvoi un int qui est le nombre de lignes supprimées dans la table
        */
        $affected = 0;

        try {
            $cmd = $this->pdo->prepare("DELETE FROM villes WHERE id_ville = ?");
            // Le deuxième argument du Bind est la valeur de l'id_ville
            // L'id_ville est récupéré via un getter de l'ojet client
            $cmd->bindValue(1, $villes->getIdVille());
            $cmd->execute();
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }


    /*
 * UPDATE
 */
    /**
     *
     * @param Villes $villes
     * @return int
     */
    // public function update(Villes $villes): int {
    //     $affected = 0;

    //     try {
    //         $cmd = $this->pdo->prepare("UPDATE villes SET nom_ville = ?, code_postal = ? WHERE id_ville = ?");
    //         $cmd->bindValue(1, $villes->getNomVille());
    //         $cmd->bindValue(2, $villes->getCp());
    //         $cmd->bindValue(3, $villes->getIdVille());
    //         $cmd->execute();
    //         $affected = $cmd->rowCount();
    //     } catch (PDOException $e) {
    //         $affected = -1;
    //     }
    //     return $affected;
    // }
    /*
     * @param type $pk
     * @return \Pays
     */
    public function selectOne(int $pk): Villes
    {

        try {
            $cursor = $this->pdo->prepare("SELECT * FROM villes WHERE id_ville = ?");
            $cursor->bindValue(1, $pk);
            $cursor->execute();
            $record = $cursor->fetch();
            if ($record != null) {
                $villes = new Villes($record[0], $record[1], $record[2]);
            } else {
                $villes = new Villes(0, "Introuvable");
            }
            $cursor->closeCursor();
        } catch (PDOException $e) {
            $villes = new Villes(-1, $e->getMessage());
        }
        return $villes;
    }
    // UPDATE « la table » SET colonne1 = valeur1, colonne2 = valeur2 WHERE PK = valeur
    /*
    * Signature d'une methode : visibilité(private ou public) function nomDeFonction(type argument1, type argument2): type
    * Les parametres sont éventuellement initialisés avec des valeurs neutres si ils sont facultatifs
    * La méthode UPDATE reçoit en parametre un objet et a un retour de type int(le nombre de lignes modifiées)
    */
    public function update(Villes $villes): int
    {
        $affected = 0;
        try {
            //Syntaxe : UPDATE « la table » SET colonne1 = valeur1, colonne2 = valeur2 WHERE PK = valeur
            $sql = "UPDATE villes SET code_postal = ?, nom_ville = ? WHERE id_ville = ?";
            // On sollicite la methode prepare() qui compile l'ordre SQL de l'objet pdo
            // L'objet pdo est un attribut de la classe Villes
            $cmd = $this->pdo->prepare($sql);
            // On valorise les valeurs des parametres de la requête SQL
            // Liaison entre le parametre 1 et la valeur récupérée dans l'objet Villes grâce à un getter
            $cmd->bindValue(1, $villes->getCp());
            $cmd->bindValue(2, $villes->getNomVille());
            $cmd->bindValue(3, $villes->getIdVille());
            // On execute la requête SQL
            $cmd->execute();
            // On récupère le nombre de ligne(s) modifiée(s)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            /*
    *On écrit dans le catch : affichage du message d’erreur : $e→getMessage()… 
    *On sollicite la methode getMessage() de l’objet $e qui est de la classe PDOException.
    */
            echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }

  /**
     *
     * @return array
     */
    public function selectAll(): array {

        //        $tPays = array();
        //        try {
        //            $cursor = $this->pdo->query("SELECT * FROM pays");
        //            $cursor->setFetchMode(PDO::FETCH_ASSOC);
        //            while ($record = $cursor->fetch()) {
        //                $pays = new Pays($record["id_pays"], $record["nom_pays"]);
        //                $tPays[] = $pays;
        //            }
        //            $cursor->closeCursor();
        //        } catch (PDOException $e) {
        //            $tPays[] = new Pays("-1", $e->getMessage());
        //        }
        //        return $tPays;
                try {
                    // Les noms des colonnes doivent avoir des alias identiques aux noms des attributs
                    $cursor = $this->pdo->query("SELECT id_ville AS idVille, code_postal AS cp, nom_ville AS nomVille FROM villes");
                    // Chargement de toutes les données
                    // Le constructeur de la classe doit avoir des paramètres facultatifs vides
                    /*
                      if you want to fetch your result into a class (by using PDO::FETCH_CLASS)
                      and want the constructor to be executed *before* PDO assings the object properties, you need to use the PDO::FETCH_PROPS_LATE constant
                     */
                    /*
                      PDOStatement::fetchAll() retourne un tableau contenant toutes les lignes du jeu d'enregistrements.
                      Le tableau représente chaque ligne
                      comme soit un tableau de valeurs des colonnes,
                      soit un objet avec des propriétés correspondant à chaque nom de colonne.
                      PDO::FETCH_CLASS: Retourne une instance de la classe désirée. Les colonnes sélectionnées sont liées aux attributs de la classe.
                     */
                    $tVilles = $cursor->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Villes");
                    // Fermeture du curseur
                    $cursor->closeCursor();
                } catch (PDOException $e) {
                    $tVilles = array();
                    $tVilles[] = new Villes("-1", $e->getMessage());
                }
                return $tVilles;
            }
        
        }
    
        ?>
