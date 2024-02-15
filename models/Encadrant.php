<?php
// Encadrant.php
class Encadrant // création de la classe Encadrant correspondant à une table de la BD projetpersobvolleyball
{
    private int $idEncadrant;
    private string $nomEncadrant;
    private string $prenomEncadrant;
    private string $numLicence;
    // Le constructeur : 
    public function __construct($idEncadrant = 0, $nomEncadrant = "", $prenomEncadrant = "", $numLicence = 0)
    {
        $this->idEncadrant = $idEncadrant; //On affecte aux valeurs des attributs les valeurs des parametres
        $this->nomEncadrant = $nomEncadrant;
        $this->prenomEncadrant = $prenomEncadrant;
        $this->numLicence = $numLicence;
    }
    // Autres méthodes
    public function setIdEncadrant(int $idEncadrant): void
    {
        $this->$idEncadrant = $idEncadrant;
    }
    public function getIdEncadrant(): int
    {
        return $this->idEncadrant;
    }
    public function setNomEncadrant(string $nomEncadrant): void
    {
        $this->$nomEncadrant = $nomEncadrant;
    }
    public function getNomEncadrant(): string
    {
        return $this->nomEncadrant;
    }
    public function setPrenomEncadrant(string $prenomEncadrant): void
    {
        $this->$prenomEncadrant = $prenomEncadrant;
    }
    public function getPrenomEncadrant(): string
    {
        return $this->prenomEncadrant;
    }
    public function setNumLicence(string $numLicence): void
    {
        $this-> numLicence = $numLicence;
    }
    public function getNumLicence(): string
    {
        return $this->numLicence;
    }
}