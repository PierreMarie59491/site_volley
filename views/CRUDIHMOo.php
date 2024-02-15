<!DOCTYPE html>
<!--
VillesInsertIHM.php
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUDIHMOo</title>
</head>
<header>
    <a href="../controllers/villesDeleteCTRLOo.php">Effacer une ville</a>
    <a href="../controllersvillesUpdateCTRLOo.php">Modifier une ville</a>
    <a href="../controllers/villesInsertCTRLOo.php">Ajouter une ville</a>
    <a href="../controllers/villesSelectAllCTRLOo.php">Liste des villes</a>
</header>

<body>
    <h3>Liste des villes</h3>

    <table border=5>
        <thead>
            <tr>
                <th>Id Ville</th>
                <th>Code Postal</th>
                <th>Nom de la ville</th>
                <th>Supprimer</th>
                <th>Modifier</th>
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

            <table border=5>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            <fieldset>
                                <h3>Ajouter / modifier une ville</h3>
                                <form action="../controllers/CRUDCTRLOo.php" method="post">
                                <label for="cp">Id Ville</label>
                                    <input type="text" name="id_ville" id="id_ville" readonly value=<?php echo $selectId?> >
                                    <label for="cp">Code Postal</label>
                                    <input type="text" name="cp" id="cp" value=<?php echo $selectCp?>>
                                    <label for="nom_ville">Nom de la ville </label>
                                    <input type="text" name="nom_ville" id="nom_ville" value=<?php echo $selectVille?>>
                        </td>
                        <td> <input type="submit" name="insertbt" />
                        </td>
                    </tr>
                    </form>
                    
                </tbody>
            </table>
          

            <label>
                <?php
                if (isset($messages)) {
                    echo $messages;
                }
                ?>
            </label>
            <!-- <h3>Effacer une Ville</h3>
            <?php
            // require_once "../daos/VillesVolleyDAOPoo.php";
            ?>
            <form action="../controllers/CRUDCTRLOo.php" method="post">
                <label>Supprimer ville? </label>
                <input type="text" name="id_ville" value="">
                <input type="submit" name="deletebt" />
            </form>

            <br>

            <label>
                <?php
                // if (isset($message)) {
                //     echo $message;
                // }
                ?>
            </label> -->
            <!-- <h3>UPDATE Ville</h3>
            <form action="../controllers/CRUDCTRLOo.php" method="POST">
                <label>id_ville </label>
                <select type="text" name="id_ville" value="">
                    <?php
                    // echo $idSelect
                    ?>
                </select>

                <input type="submit" name="selectbt" value="Choisir une ville" />
            </form>

            <form action="../controllers/CRUDCTRLOo.php" method="POST">
                <label>Id Ville </label>
                <input type="text" name="id_ville" value="<?php echo $selectId ?>" readonly = readonly>
                <label>Code Postal</label>
                <input type="text" name="cp" value="<?php echo $selectCp ?>">
                <label>Nom de la ville</label>
                <input type="text" name="nom_ville" value="<?php echo $selectVille ?>">

                <input type="submit" name="updatebt" value="Modifier les infos de la ville" />
            </form>

            <br>

            <label>
                <?php
                // if (isset($message)) {
                //     echo $message;
                // }
                ?>
            </label> -->

        </tbody>
    </table>
</body>

</html>