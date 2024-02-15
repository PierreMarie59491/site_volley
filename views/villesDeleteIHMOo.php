<!DOCTYPE html>
<!--
VillesInsertIHM.php
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>deleteVillesIHMOo.php</title>
</head>
<header>
<a href="../controllers/villesDeleteCTRLOo.php">Effacer une ville</a>
    <a href="../controllersvillesUpdateCTRLOo.php">Modifier une ville</a>
    <a href="../controllers/villesInsertCTRLOo.php">Ajouter une ville</a>
    <a href="../controllers/villesSelectAllCTRLOo.php">Liste des villes</a>
</header>
<body>
    <h3>Effacer une Ville</h3>
    <?php
    require_once "../daos/VillesVolleyDAOPoo.php";
    ?>
    <form action="../controllers/VillesDeleteCTRLOo.php" method="post">
        <label>Supprimer ville? </label>
        <input type="text" name="id_ville" value="">      
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