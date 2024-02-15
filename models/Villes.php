<?php
// Equipes.php


class Villes // création de la classe Villes corespondant à une table de la BD projetpersobvolleyball
{
    //Liste des attributs, ils sont ici privés et typés (depuis PHP8) de la classe.
    //Les attribut sont privés pour qu'on ne puisse pas y acceder directement
    //mais indirectement via les setters ou constructeur en écriture
    //et que l'on puisse justement via les setters et contructeur contrôler les données entrantes
    
    
    //pour la BD cours table villes
    // private string $cp; 
    // private string $nomVille;
    // private string $site;
    // private string $photo;
    // private int $idVilles;


    // pour la BD projetpersobvolleyball
    private int $idVille;
    private string $cp;
    private string $nomVille;

    // Le constructeur : 
    //pour la BD Cours
    // public function __construct($cp = "",  $nomVille = "", $site = "", $photo = "", $idVilles = 0)
    public function __construct($idVille = 0, $cp = "", $nomVille = "")
    /*
     * Le constructeur est exécuté automatiquement lorsque l'objet est instancié
     * On affecte la valeur de chaque parametre à chaque attribut de la classe
     * Si les parametres de la méthode sont initialisés, alors ils sont facultatifs
     */
    {
        $this->cp = $cp; //On affecte aux valeurs des attributs les valeurs des parametres
        $this->nomVille = $nomVille;
        // $this->site = $site;
        // $this->photo = $photo;
        $this->idVille = $idVille;
    }
    // Autres méthodes
    public function setCp(string $cp): void
    {
        $this->cp = $cp;
    }
    public function getCp(): string
    {
        return $this->cp;
    }
    public function setNomVille(string $nomVille): void
    {
        $this->nomVille = $nomVille;
    }
    public function getNomVille(): string
    {
        return $this->nomVille;
    }

    public function setIdVille(int $idVille): void
    {
        $this->idVille = $idVille;
    }
    public function getIdVille(): int
    {
        return $this->idVille;
    }
}

    // public function setSite(string $site): void
    // {
    //     $this->site = $site;
    // }
    // public function getSite(): string
    // {
    //     return $this->site;
    //}

    // public function setPhoto(string $photo): void
    // {
    //     $this->photo = $photo;
    // }
    // public function getPhoto(): string
    // {
    //     return $this->photo;
    //}
    
