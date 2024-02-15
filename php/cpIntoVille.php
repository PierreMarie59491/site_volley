<?php

// cpIntoVille.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

try {
    $bdd = new PDO("mysql:host=localhost;port=3306;dbname=cours;", "root", "");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$cp = filter_input(INPUT_GET, "cp"). "%";
// $cp = '5912%';

$query = $bdd->prepare("SELECT nom, cp FROM villes_bis WHERE cp LIKE ?");
$query->execute([$cp]);
$villes = $query->fetchAll(PDO::FETCH_ASSOC);

// $options = '';
// foreach ($villes as $ville) {
//     $options .= '<option value="' . $ville['nom'] . '">' . $ville['nom'] . '</option>';
// }

// echo $options;

// foreach ($villes as $ville) {
//     echo $ville['nom'] . "-" . $ville['cp'] . "<br>";
// }

echo json_encode($villes);

?>