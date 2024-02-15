<?php
include_once("../daos/VillesVolleyDAO.php");
try {
  $pdo = seConnecter("../conf/projetPersoVolley.ini");
  /*
 * CSV2BD.php
 */

  /*
  cp;nom_ville;site;photo;id_pays

  '00001','Hein',www.hein.fr;hein.png;DZ
  06500;Menton;;;033

  INSERT INTO `generique (`cp`, `nom_ville`, `site`, `photo`, `id_pays`) VALUES (?,?,?,?,?);
 * 
 * 
  La liste des colonnes est sur la première ligne
  La liste des valeurs est sur les lignes suivantes
  donc boucle sur les lignes pour les bindparam pu execute(array)
 */


  header("Content-Type: text/html;charset=UTF-8");
  //header("Content-Type: text/html;charset=ISO-8859-1");
  //
  //
  $fileName = filter_input(INPUT_POST, "csv");
  // String
  $content = file_get_contents("../ressources/$fileName.csv");
  // Explode : string -> array

  $tableName = $fileName . "_bis";

  $tableau = explode("\n", $content);

  // echo "<pre>";
  // var_dump($tableau);
  // echo "</pre>";
  //On remplace les ";" par des "," dans la première ligne d l'array $tableau
  $colonnes = str_replace(";", ",", $tableau[0]);
echo $colonnes;

  // On détermine le nombre de token "VALUE" en fonction de la table ciblé
  $nbParametres = count(explode(",", $tableau[0]));
  echo "<br>$nbParametres  paramètres . <br>";
  // echo "<br>$colonnes</br>";


  // ?,?,? récupération du nombre de paramètres de la table ciblée
  $parametres = "";
  for ($index = 0; $index < $nbParametres; $index++) {
    $parametres .= "?,";
  }
  $parametres = substr($parametres, 0, -1);
  echo $parametres ."<br>";


  $insert = "INSERT INTO $tableName($colonnes) VALUES($parametres)";
  $cmd = $pdo->prepare($insert);



  for ($i = 1; $i < count($tableau); $i++) {

    if (trim($tableau[$i]) != "") {
      $values = explode(",", $tableau[$i]);
      $cmd->execute($values);
    }
  }
  echo "Nouvelle table remplie avec succès";
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
//   $affected = -1;
// }
// return $affected;



?>




<form method="POST" action="CSV2BDSiteVolley.php">
  Nom du fichier à importer? <input type="text" name="csv"></input>
  <input type="submit" name="submit" value="Valider">
</form>