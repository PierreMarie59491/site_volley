<?php
// Equipes.php
class Equipes // création de la classe Equipes corespondant à une table de la BD projetpersobvolleyball
{
    private int $idEquipe;
    private string $nomEquipe;
    private int $idEncadrant;
    // Le constructeur : 
    public function __construct($idEquipe = 0, $nomEquipe = "", $idEncadrant = 0)
    {
        $this->idEquipe = $idEquipe; //On affecte aux valeurs des attributs les valeurs des parametres
        $this->nomEquipe = $nomEquipe;
        $this->idEncadrant = $idEncadrant;
    }
    // Autres méthodes
    public function setIdEquipe(int $idEquipe): void
    {
        $this->$idEquipe = $idEquipe;
    }
    public function getIdEquipe(): int
    {
        return $this->idEquipe;
    }
    public function setNomEquipe(string $nomEquipe): void
    {
        $this->$nomEquipe = $nomEquipe;
    }
    public function getNomEquipe(): string
    {
        return $this->nomEquipe;
    }
    public function setIdEncadrant(int $idEncadrant): void
    {
        $this->idEncadrant = $idEncadrant;
    }
    public function getIdEncadrant(): int
    {
        return $this->idEncadrant;
    }
}