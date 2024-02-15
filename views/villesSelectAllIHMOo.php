<!DOCTYPE html>
<!--
VillesInsertIHM.php
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>PaysSelectAllIHM</title>
</head>
<header>
<a href="../controllers/villesDeleteCTRLOo.php">Effacer une ville</a>
    <a href="../controllersvillesUpdateCTRLOo.php">Modifier une ville</a>
    <a href="../controllers/villesInsertCTRLOo.php">Ajouter une ville</a>
    <a href="../controllers/villesSelectAllCTRLOo.php">Liste des villes</a>
</header>

<body>
    <h3>Liste des villes</h3>

    <table border = 5>
        <thead>
            <tr>
                <th>Id Ville</th>
                <th>Code Postal</th>
                <th>Nom de la ville</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            
            // foreach ($t as $objet) 
            // // {
            // //     echo "<tr>" . "<td>" . $objet->getIdVille() . "</td>"  
            // //      . "<td>" . $objet->getCp() . "</td>"
            // //      . "<td>" . $objet->getNomVille() . "</td>" . "</tr>" . "<br>";
            // // }
            // {
            //     $contenu .= "<tr>";
            //     $contenu .= "<td>" . $objet->getIdVille() ."</td>";
            //     $contenu .= "<td>" . $objet->getCp() ."</td>";
            //     $contenu .= "<td>" . $objet->getNomVille() ."</td>";
            //     $contenu .= "</tr>";
            // }
           echo $contenu;
            // var_dump ($objet);
            ?> </tr>
        </tbody>
    </table>

    </form>
</body>

</html>