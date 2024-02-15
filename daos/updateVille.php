<?php

declare(strict_types=1);
require_once "../models/Villes.php";

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

    ?>