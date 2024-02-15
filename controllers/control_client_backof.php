<?php

// control_client_backof.php

declare(strict_types=1);
require_once('../models/Client.php');
require_once('../daos/clientDAOPoo.php');

// Connexion POO 

require_once("../lib/functionConnectionPOO.php");

// localhost
$cnx = new Connexion();
$pdo = $cnx->connectionPOO("../conf/connexionLocalhost.ini");


// DB AD
// $cnx = new Connexion();
// $pdo = $cnx->connectionPOO("../conf/connexionAD.ini");


$dao = new ClientDAO($pdo);


// Call Select ALL pour table client 
$content = "";

$tclient = $dao->selectAll();

foreach ($tclient as $objet) {
    $content .= "<tr><td>" . $objet->getIdClient() . "</td><td>" . $objet->getCiviliteClient() . "</td><td>" . $objet->getLastNameClient() . "</td><td>" . $objet->getFirstNameClient() . "</td><td>" . $objet->getBirthClient() . "</td><td>" . $objet->getAddressClient() . "</td><td>" . $objet->getPhoneClient() . "</td><td>" . $objet->getEmailClient() . "</td><td>" . $objet->getPwdClient() . "</td><td>" . $objet->getIdCity() . "</td>";
    $content .= "<td><a href='control_client_backof.php?action=delete&idclient=" . $objet->getIdClient() . "'>";
    $content .= "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M4 7l16 0'/><path d='M10 11l0 6'/><path d='M14 11l0 6'/><path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'/><path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'/></svg>";
    $content .= "</a></td>";
    $content .= "<td><a href='control_client_backof.php?action=update&idclient=" . $objet->getIdClient() . "'>";
    $content .= "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1' /><path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z' /><path d='M16 5l3 3' /></svg>";
    $content .= "</a></td></tr>";
}


// SELECT POUR FORM VILLE 
$contenuSelect = "";
try {
    $select = "SELECT id_city, name_city FROM city";

    $curseur = $pdo->query($select);

    foreach ($curseur as $enregistrement) {
        $contenuSelect .= "<option value='$enregistrement[0]'>$enregistrement[1]</option>\n";
    }

    $curseur->closeCursor();

} catch (PDOException $e) {
    $contenuSelect = "Echec de l'exécution : " . $e->getMessage();
}


// FILTER INPUT COMMUN DELETE ET UPDATE

$action = filter_input(INPUT_GET, 'action');
$idClient = intval(filter_input(INPUT_GET, "idclient"));

if ($action == "update") {
    $update = 1;
    $delete = 0;
  } else if ($action == "delete") {
    $update = 0;
    $delete = 1;
  } else {
    $update = 0;
    $delete = 0;
  }
//   echo "update = $update <br>";
//   echo "delete = $delete <br>";

$btSubmitUpdate = filter_input(INPUT_POST, "btSubmitUpdate");
$btSubmitInsert = filter_input(INPUT_POST, "btSubmitInsert");
if ($btSubmitUpdate == "Modifier") {
    $validUpdate = 1;
    $validInsert = 0;
  } else if ($btSubmitInsert == "Insérer") {
    $validUpdate = 0;
    $validInsert = 1;
  } else {
    $validUpdate = 0;
    $validInsert = 0;
  }

  // echo "validUpdate = $validUpdate <br>";
  // echo "validInsert = $validInsert <br>";

// DELETE

$messageDelete = "";

if ($delete === 1 && $idClient !=null){
    $clientDelete = new Client($idClient);

    $messageDelete = $dao->delete($clientDelete) . " supression faite";
}


// UPDATE 

if ($idClient != null && $update === 1){
    $client = $dao->selectOne($idClient);
    $civiliteUp = $client->getCiviliteClient();
    $lastNameUp = $client->getLastNameClient();
    $firstNameUp = $client->getFirstNameClient();
    $birthUp = $client->getBirthClient();
    $addressUp = $client->getAddressClient();
    $cityUp = $client->getIdCity();
    $phoneUp = $client->getPhoneClient();
    $emailUp = $client->getEmailClient();
    $pwdUp = $client->getPwdClient();
}

// Récupere les valeurs dans form Update Pour modif
$idClientNew  = filter_input(INPUT_POST, "id");
$civiliteNew = filter_input(INPUT_POST, "civilite");
$lastNameNew = (filter_input(INPUT_POST, "lastName"));
$firstNameNew = (filter_input(INPUT_POST, "firstName"));
$birthNew = filter_input(INPUT_POST, "birth");
$emailNew = (filter_input(INPUT_POST, "email"));
$pwdNew = filter_input(INPUT_POST, "pwd");
$addressNew = filter_input(INPUT_POST, "address");
$cityNew = filter_input(INPUT_POST, "city");
$phoneNew = (filter_input(INPUT_POST, "phone"));
$messageUpdate = "";


// Call UPDATE
if ($validInsert === 0 && $validUpdate === 1  && $civiliteNew != null && $lastNameNew != null && $firstNameNew != null && $birthNew!= null && $emailNew != null && $pwdNew != null && $addressNew!= null && $cityNew != null && $phoneNew != null) {

    

  $clientUpdate = new Client($idClientNew, $civiliteNew, $lastNameNew, $firstNameNew, $birthNew, $addressNew, $phoneNew, $emailNew, $pwdNew, $cityNew);

$messageUpdate = $dao->update($clientUpdate) . " mise à jour faite";
    
} 



// INSERT

// FIlTER INPUT INSERT 

$civilite = filter_input(INPUT_POST, "civilite");
$lastName = (filter_input(INPUT_POST, "lastName"));
$firstName = (filter_input(INPUT_POST, "firstName"));
$birth = filter_input(INPUT_POST, "birth");
$email = (filter_input(INPUT_POST, "email"));
$pwd = filter_input(INPUT_POST, "pwd");
$address = filter_input(INPUT_POST, "address");
$city = filter_input(INPUT_POST, "city");
$phone = (filter_input(INPUT_POST, "phone"));

$messageInsert = "";


//Call Insert

if ($validInsert === 1 && $validUpdate === 0 && $civilite != null && $lastName != null && $firstName != null && $birth != null && $address != null && $city != null && $phone != null && $email != null && $pwd != null) {

    $clientInsert = new Client(0, $civilite, $lastName, $firstName, $birth, $address, $phone, $email, $pwd, $city);

    $messageInsert = $dao->insert($clientInsert). " insertion faite";
} 


// Include 

include('../views/client_backof_ihm.php');

?>