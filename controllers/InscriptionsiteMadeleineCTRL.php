<?php
// SQL paramétré : VillesInsertCTRL.php
header("Content-Type: text/html; charset=UTF-8");

$message = "";
$civilite = filter_input(INPUT_POST, "civilite");
$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$licence = filter_input(INPUT_POST, "licence");
$telephone = filter_input(INPUT_POST, "telephone");
$adresse = filter_input(INPUT_POST, "adresse");
$codepost = filter_input(INPUT_POST, "codepost");
$ville = filter_input(INPUT_POST, "ville");
$email1 = filter_input(INPUT_POST, "email1");
$email2 = filter_input(INPUT_POST, "email2");
$pwd1 = filter_input(INPUT_POST, "mdp1");
$pwd2 = filter_input(INPUT_POST, "mdp2");
$datenaiss = filter_input(INPUT_POST, "datedenaissance");
$pseudo = FILTER_INPUt(INPUT_POST, "pseudo");
$idville = FILTER_INPUT(INPUT_POST, "ville");
$idequipe = FILTER_INPUT(INPUT_POST, "idequipe");
$encadrant = FILTER_INPUT(INPUT_POST, "idencadrant");
$villeSelect = "";
$options1 = "";
$options2 = "";

// on essaie de travailler avec la BD
try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projetpersovolleyball", "root", "");
    // Les erreurs sont gérées comme des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // bd <-> TUYAU <-> page
    $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT id_ville, nom_ville FROM ville";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $villeSelect .= "<option value='$enregistrement[0]'>$enregistrement[1]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message = 'Echec de l\'exécution : ' . $e->getMessage();
}

// on essaie de travailler avec la BD
try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projetpersovolleyball", "root", "");
    // Les erreurs sont gérées comme des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // bd <-> TUYAU <-> page
    $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT id_equipe, nom_equipe FROM equipe";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $options1 .= "<option value='$enregistrement[0]'>$enregistrement[1]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message = 'Echec de l\'exécution : ' . $e->getMessage();
}
// on essaie de travailler avec la BD
try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projetpersovolleyball", "root", "");
    // Les erreurs sont gérées comme des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // bd <-> TUYAU <-> page
    $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT id_encadrant, nom, prenom FROM encadrant";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $options2 .= "<option value='$enregistrement[0]'>$enregistrement[1] $enregistrement[2]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message = 'Echec de l\'exécution : ' . $e->getMessage();
}


if ($civilite != null && $nom != null && $prenom != null && $pseudo != null && $licence != null  && $telephone != null && $adresse != null  ) {
    //est-ce que les saisies sont correcte ?//
    $nKo = 0; //variable permettant de contrôler si tous les champs sont correctement remplis//
    //vérificaion de conformité des inputs
    if ($civilite == null) {
        $message1 = "<div  class='reponseKO'> Civilité KO !!!</div>";
        $nKo++;
    } else {
        $message1 = "<div>$civilite</div>";
    }
    if ($nom == null) {
        $message2 = "<div  class='reponseKO'> Nom KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[A-ZÀ-ÿ][A-Za-zÀ-ÿ -']{0,49}$/", $nom)) {
        $message2 = "<div class='reponseKO'> Nom invalide </div>";
        $nKo++;
    } else {
        $message2 = "<div>$nom</div>";
    }

    if ($prenom == null) {
        $message3 = "<div  class='reponseKO'> Prénom KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[A-ZÀ-ÿ][A-Za-zÀ-ÿ \-]{0,49}$/", $prenom)) {
        $message3 = "<div class='reponseKO'> Prénom invalide </div>";
        $nKo++;
    } else {
        $message3 = "<div>$prenom</div>";
    }
    if ($datenaiss == null) {
        $message4 = "<div  class='reponseKO'> Date KO !!!</div>";
        $nKo++;
    } else {
        $message4 = "<div>$datenaiss</div>";
    }

    if ($email1 == null) {
        $message5 = "<div  class='reponseKO'> E-mail KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/", $email1)) {
        $message5 = "<div class='reponseKO'> E-mail invalide </div>";
        $nKo++;
    } else {
        $message5 = "<div>$email1</div>";
    }

    if ($email2 == null || $email2 != $email1) {
        $message6 = "<div  class='reponseKO'> E-mail2 KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/", $email2)) {
        $message6 = "<div class='reponseKO'> E-mail invalide </div>";
        $nKo++;
    } else {
        $message6 = "<div>$email2</div>";
    }

    if ($pwd1 == null) {
        $message7 = "<div  class='reponseKO'> Pwd KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{10,}$/", $pwd1)) {
        $message7 = "<div class='reponseKO'> Mot de passe invalide, votre mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 caractère spécial et au moins 10 caractères. </div>";
        $nKo++;
    } else {
        $message7 = "<div>$pwd1</div>";
    }


    //mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 caractère spécial et au moins 10 caractères
    if ($pwd2 == null || $pwd2 != $pwd1) {
        $message8 = "<div  class='reponseKO'> Erreur de confirmation, votre mot de passe ne correspond pas au premier renseigné !!!</div>";
        $nKo++;
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{10,}$/", $pwd2)) {
        $message8 = "<div class='reponseKO'> Mot de passe invalide </div>";
        $nKo++;
    } else {
        $message8 = "<div>$pwd1</div>";
    }

    if ($adresse == null) {
        $message9 = "<div  class='reponseKO'> Adresse KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/[0-9a-zA-Z-]{0,49}$/", $adresse)) {
        $message9 = "<div class='reponseKO'> Adresse invalide </div>";
        $nKo++;
    } else {
        $message9 = "<div>$adresse</div>";
    }

    if ($ville == null) {
        $message9 = "<div  class='reponseKO'> Ville KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[A-ZÀ-ÿ][A-Za-zÀ-ÿ \-]{0,49}$/", $ville)) {
        $message9 = "<div class='reponseKO'> Ville invalide </div>";
        $nKo++;
    } else {
        $message9 = "<div>$ville</div>";
    }

    if ($codepost == null) {
        $message10 = "<div  class='reponseKO'> CP KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/[0-9]{1,5}/", $codepost)) {
        $message10 = "<div class='reponseKO'> CP invalide </div>";
        $nKo++;
    } else {
        $message10 = "<div>$codepost</div>";
    }

    if ($telephone == null) {
        $message11 = "<div  class='reponseKO'> Phone KO !!!</div>";
        $nKo++;
    } else if (!preg_match("/^[0][1-9](-[0-9]{2}){4}$/", $telephone)) {
        $message11 = "<div class='reponseKO'> Numéro de tél invalide </div>";
        $nKo++;
    } else {
        $message11 = "<div>$telephone<div>";
    }
    // Si tout est bon, on va vers la BD//
    // déclare et init
    $message = "";
    $options = "";

    

    try {
        /*
         * Connexion
         */
        $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projetpersovolleyball", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");

        /*
         * INSERTION
         */
        $sql = "INSERT INTO adherent (civilite, nom, prenom, pseudo, mot_de_passe, num_licence, tel_adherent, adresse, email, dateDeNaissance, id_equipe, id_encadrant, id_ville) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";


        $statement = $pdo->prepare($sql);


        $statement->bindParam(1, $civilite, PDO::PARAM_STR);
        $statement->bindParam(2, $nom, PDO::PARAM_STR);
        $statement->bindParam(3, $prenom, PDO::PARAM_STR);
        $statement->bindParam(4, $pseudo, PDO::PARAM_STR);
        $statement->bindParam(5, $pwd1, PDO::PARAM_STR);
        $statement->bindParam(6, $licence, PDO::PARAM_STR);
        $statement->bindParam(7, $telephone, PDO::PARAM_STR);
        $statement->bindParam(8, $adresse, PDO::PARAM_STR);
        $statement->bindParam(9, $email1, PDO::PARAM_STR);
        $statement->bindParam(10, $datenaiss, PDO::PARAM_STR);
        $statement->bindParam(11, $idequipe, PDO::PARAM_STR);
        $statement->bindParam(12, $encadrant, PDO::PARAM_STR);
        $statement->bindParam(13, $idville, PDO::PARAM_STR);


        $statement->execute();


        $message = $statement->rowcount() . /*$statement1->rowcount()*/  " Inscription réussie ! Bienvenue dans notre club !";


        // Fermeture du curseur (facultatif)
        $curseur->closeCursor();
    }
    // Gestion des erreurs
    catch (PDOException $e) {
        // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
        // de l'objet $e de la classe PDOException
        $message = 'Echec de l\'exécution : ' . $e->getMessage();
    }

    // Déconnexion (facultative)
    $pdo = null;
} else {
    $message = "Toutes les saisies sont obligatoires";
}

include("../views/inscriptionSiteMadeleine.php");
