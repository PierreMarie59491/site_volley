<body>
    <h3>UPDATE Ville</h3>
    <form action="../controllers/villesUpdateCTRLOo.php" method="POST">
        <label>id_ville </label>
        <select type="text" name="id_ville" value="">
            <?php
            echo $idSelect
            ?>
        </select>
       
        <input type="submit" name="choisir" value="Choisir une ville" />
    </form>

    <form action="../controllers/villesUpdateCTRLOo.php" method="POST">
        <label>Id Ville </label>
        <input type="text" name="id_ville" value="<?php echo $selectId ?>" readonly>
        <label>Code Postal</label>
       <input type="text" name="cp" value="<?php echo $selectCp?>">   
       <label>Nom de la ville</label>
       <input type="text" name="nom_ville" value="<?php echo $selectVille?>">

        <input type="submit" name="insert" value="Modifier les infos de la ville" />
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