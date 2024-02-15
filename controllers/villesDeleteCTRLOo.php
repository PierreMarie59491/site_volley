<?php
// Rôle du contrôleur : gérer les requêtes htt^(request response)


//Chargement des fichiers annexes 'require_once'
require_once '../daos/VillesVolleyDAOPoo.php';
require_once '../models/Villes.php';
require_once '../models/Connexion.php';

$idVille=0;
if ($idVille!= null){
    
// Récupération des valeurs saisies dans le formulaire
$idVille = FILTER_INPUT(INPUT_POST, 'id_ville');
}

//Contrôler la qualité des valeurs saisies dans le formulaire
// Expression régulière pour savoir si c'est un nombre entier (un int)


// On instancie l'objet Villes en valorisant l'attribut id_ville
$ville = new Villes($idVille);

// Connexion à la BD
$cnx = new Connexion();
// $tx = new Transaxion();

$pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
// $tx->initialiser($pdo);


// On instancie un objet DAO (VillesDAO, ici)
// Instanciation du DAO
$dao = new VillesDAOPoo($pdo);


//On sollicite la méthode DELETE du DAOPoo et on récupère le nombre de lignes supprimées
$affected = $dao->delete($ville);

// On créé l'IHM : 
$message = $affected . "lignes supprimées<br>";

include '../views/villesDeleteIHMOo.php';


