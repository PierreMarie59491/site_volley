<!DOCTYPE html>
<!--
VillesInsertIHM.php
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>PaysInsertIHM</title>
</head>
<header>
<a href="../controllers/villesDeleteCTRLOo.php">Effacer une ville</a>
    <a href="../controllersvillesUpdateCTRLOo.php">Modifier une ville</a>
    <a href="../controllers/villesInsertCTRLOo.php">Ajouter une ville</a>
    <a href="../controllers/villesSelectAllCTRLOo.php">Liste des villes</a>
</header>
<body>
    <h3>INSERT Pays</h3>
    <form action="../controllers/VillesInsertCTRLOo.php" method="post">
        <label for="cp">Code Postal</label>
        <input type="text" name="cp" id="cp" value="">
        <label for="nom_ville">Nom de la ville </label>
        <input type="text" name="nom_ville" id="nom_ville" value="">
 

        <input type="submit" />
    </form>

    <br>

    <label>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </label>
</body>

</html>