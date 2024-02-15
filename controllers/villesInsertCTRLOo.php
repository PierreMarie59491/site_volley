<?php
// Rôle du contrôleur : gérer les requêtes htt^(request response)


//Chargement des fichiers annexes 'require_once'
require_once '../daos/VillesVolleyDAOPoo.php';
require_once '../models/Villes.php';
require_once '../models/Connexion.php';




// Récupération des valeurs saisies dans le formulaire
// $idVille = FILTER_INPUT(INPUT_POST, 'id_ville');
$nomVille = FILTER_INPUT(INPUT_POST, 'nom_ville');
$cp = FILTER_INPUT(INPUT_POST, 'cp');

//Contrôler la qualité des valeurs saisies dans le formulaire
// Expression régulière pour savoir si c'est un nombre entier (un int)


// On instancie l'objet Villes en valorisant les attributs cp et nomVille
$villes = new Villes(0, $cp, $nomVille);
// $Nomvilles= new Villes($nomVille);
// $Cp= new Villes($cp);


// Connexion à la BD
$cnx = new Connexion();
// $tx = new Transaxion();

$pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
// $tx->initialiser($pdo);


// On instancie un objet DAO (VillesDAO, ici)
// Instanciation du DAO
$dao = new VillesDAOPoo($pdo);


//On sollicite la méthode DELETE du DAOPoo et on récupère le nombre de lignes supprimées
$affected = $dao->insert($villes);

// On créé l'IHM : 
$message = $affected . "lignes ajoutée(s)<br>";


include '../views/VillesInsertIHMOo.php';
