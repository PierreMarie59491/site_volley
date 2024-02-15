<!DOCTYPE html>
<!--
inscriptionSiteMadeleine.php
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/lmvbvastyle.css">
    <title class="inscription">Inscription sur le site de La madeleine volley-ball</title>
</head>
<header>
    <?php
    include 'header.php';
    ?>
</header>

<body>

    <h3 class="entete"><span>INSCRIPTION</span></h3>
    <form action="../controllers/InscriptionsiteMadeleineCTRL.php" method="POST" class="fomulaire" id="formInscription" name="formInscription">
        <label class="etiquette">Civilit&eacute; : </label>
        <label for="civilite_H" class="etiquette">Monsieur </label>
        <input type="radio" name="civilite" id="civilite_H" value="H" class="obligatoire" />
        <label class="etiquette" for="civilite_F">Madame </label>
        <input type="radio" name="civilite" id="civilite_F" value="F" class="obligatoire" /><br>
        <label class="etiquette">Nom </label>
        <input type="text" name="nom" value="Marie" size="10" id="nom" /><br>
        <label class="etiquette">Prénom </label>
        <input type="text" name="prenom" value="Isabelle" id="prenom" /><br>
        <label class="etiquette">Pseudo</label>
        <input type="text" name="pseudo" value="Isabella" id="pseudo"><br>
        <label class="etiquette">Date de naissance</label>
        <input type="date" name="datedenaissance" value="1987-12-09" size="10" id="birth" /><br>
        <label class="etiquette">Licence </label>
        <input type="text" name="licence" value="2633181" size="10" id="licence" /><br>
        <label class="etiquette">email </label>
        <input type="text" name="email1" value="PB@gmail.com" size="10" id="email1" /><br>
        <label class="etiquette">Retappez votre email </label>
        <input type="text" name="email2" value="PB@gmail.com" size="10" id="email2" /><br>
        <label class="etiquette">Mot de passe </label>
        <input type="password" name="mdp1" value="PB@gmail.com" size="10" id="mdp1" /><br>
        <label class="etiquette">Retappez votre mot de passe </label>
        <input type="password" name="mdp2" value="PB@gmail.com" size="10" id="mdp2" /><br>
        <label class="etiquette">Téléphone </label>
        <input type="text" name="telephone" value="0231378670" id="telephone" /><br>
        <label class="etiquette">Adresse </label>
        <input type="textarea" name="adresse" value="rue Maxence Van Der Meersch" id="adresse" /><br>
        <label class="etiquette">Ville </label>
        <select id="villeSelect" name="villeSelect" size="3">

           
        </select><br>
        <label class="etiquette">Code Postal </label>
        <input type="text" name="cpInput" value="" id="cpInput" /><br>
        <label class="etiquette">Catégorie </label>
        <select class="etiquette" name="idequipe">

            <?php
            echo $options1;
            ?>
        </select><br>
        <label class="etiquette">Encadrant </label>
        <select class="etiquette" name="idencadrant">

            <?php
            echo $options2;
            ?>
        </select><br>


        <input type="submit" class="button" value="Valider" name="btSumbit" id="btSubmit" />
    </form>
    
    <br>

    <label id="lblMessage" style="color:red">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </label>
    <script src="../js/formInscription.js"></script>
    <script src="../js/cpIntoVille.js"></script>
</body>
<footer>
    <?php
    include 'footer.php';
    ?>
</footer>

</html>