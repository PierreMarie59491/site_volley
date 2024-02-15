<?php
session_start ();
if ($_SESSION["authentifier"] == 1){
  include "../views/accueil.php"; 
}else{
    include "../controllers/AuthentificationCTRL.php";
    echo "Veuillez vous connecter pour acceder à cette page.";
}






?>