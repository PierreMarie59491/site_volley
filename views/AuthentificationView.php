<!DOCTYPE html>
<!-- AuthentificationIHM.php -->
<html>

<head>
    <meta charset="UTF-8">
    <title>Authentification La Madeleine Volley-Ball</title>
</head>
<header>
    <?php
    include "header.php";
    ?>
</header>

<body>

    <fieldset class="authentification">
        <label class="authentif"><u>Authentification</u></label>
        <form action="../controllers/AuthentificationCTRL.php" method="POST" class="ficheAuthentif" id="ficheAuthentif">
            <table>
                <tr>
                    <td class="pass">Pseudo </td>
                    <td><input type="text" name="pseudo" id="pseudo" value="<?php echo $cookiePseudo ?>" /></td>
                </tr>
                <tr>
                    <td class="pass">Mot de passe </td>
                    <td><input type="password" name="mdp" id="mdp" value="<?php echo $cookieMdp ?>" /></td>
                <tr>
                    <td>
                        <label name="lblMdpVisible" id="lblMdpVisible">
                            Afficher le mot de passe
                        </label>
                    </td>
                    <td>
                        <input type="checkbox" name="chkMdpVisible" id="chkMdpVisible">

                    </td>
                </tr>
                </tr>
                <tr>
                    <td class="pass">Se souvenir de moi ?</td>
                    <td><input type="checkbox" name="rememberMe" checked></td>

                </tr>
                <tr>
                    <td><input type="reset" value="R&eacute;initialiser" name="btReinitialiser" id="btReinitialiser" /></td>
                    <td><input type="submit" value="Valider" name="btValider" id="btValider" /></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <label id="lblMessage">
        <?php
        if (isset($message)) {
            echo ($message);
        }
        ?>
    </label>
   
</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>

</html>