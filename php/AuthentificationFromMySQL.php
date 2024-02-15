<?php
session_start(); //On démarre la gesion de session
// AuthentificationFromMySQL.php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

$message = "";

$pseudo = filter_input(INPUT_GET, "pseudo");
$mdp = filter_input(INPUT_GET, "mdp");


// $remember = filter_input(INPUT_POST, "rememberMe");
// $cookieMdp = filter_input(INPUT_COOKIE, "mdp");
// $cookiePseudo = filter_input(INPUT_COOKIE, "pseudo");

// if ($remember != null) {
//     setCookie("pseudo", $pseudo, time() + (3600 * 24 * 14), "/");
//     setCookie("mdp", $mdp, time() + (3600 * 24 * 14), "/");
// } else {
//     setCookie("mdp", "", time());
//     setCookie("pseudo", "", time());
// }

// if ($cookieMdp != null) {

//     echo "Le cookie MDP a été créé : " . $cookieMdp . "<br>";
// }

// if ($cookiePseudo != null) {

//     echo "Le cookie Pseudo a été créé : " . $cookiePseudo;
// }

if ($pseudo != null && $mdp != null) {
    try {
        /*
         * Connexion
         */
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=projetpersovolleyball;", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");

        // Le SELECT
        $select = "SELECT * FROM adherent WHERE pseudo=? AND mot_de_passe=?";
        // Compilation du SELECT
        $curseur = $pdo->prepare($select);
        // Valorisation des paramètres
        $curseur->bindParam(1, $pseudo);
        $curseur->bindParam(2, $mdp);
        // Exécution du SELECT
        $curseur->execute();
        // Récupération ou pas d'un enregistrement
        // http://php.net/manual/fr/pdostatement.fetch.php
        $enregistrement = $curseur->fetch();
      
        if ($enregistrement === FALSE )
//         // || $remember === null) 
        {
//             // $_SESSION["authentifier"] = 0;
            $message = "KO";
            // $message = ["message" => "KO"];
            // $message = "Le pseudo et le mot de passe de correspondent pas, vous n'êtes pas connecté(e)";
//             // setCookie("mdp", "", time(), "/");
//             // setCookie("pseudo", "", time(), "/");
//             // include "../views/AuthentificationView.php";
        } else {
//             // $_SESSION["authentifier"] = 1;
            $message = "OK";
            // $message = ["message" =>"OK"];
            // $message = "0K, vous êtes connecté(e)";
//             // setCookie("pseudo", $pseudo, time() + (3600 * 24 * 14), "/");
//             // setCookie("mdp", $mdp, time() + (3600 * 24 * 14), "/");
//             // include "../views/AuthentificationOkAvecCookie.php";
        }
        // echo json_encode($message);
        // echo $message;
        $curseur->closeCursor();
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
        // $message = ["message" => $e->getMessage()];
        // echo json_encode($message);

    $pdo = null;}
} else {
    $message = -1;
    // $message = ["message" => "Toutes les saisies sont obligatoires !!!"];
    // echo json_encode($message);

    // include "../views/AuthentificationView.php";
}
echo json_encode(["message"=> $message]);