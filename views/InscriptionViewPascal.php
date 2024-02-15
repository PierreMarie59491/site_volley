<!DOCTYPE html>
<!--
Inscription.PHP
-->
<html lang="fr">
    <head>
        <!--        <meta charset="UTF-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="description" content="Site de ventes d'oeuvres d'art - Peinture Sculpture Dessin">
        <meta name="author" content="Pascal Buguet" />
        <meta name="copyright" content="Pascal Buguet" />

        <title>Inscription</title>
        <link rel="shortcut icon" href="../icons/smiley_sun_glasses.png" type="image/png" alt="FavIcon" />

        <link href="../css/header.css" rel="stylesheet" type="text/css" />
        <link href="../css/nav.css" rel="stylesheet" type="text/css" />
        <link href="../css/footer.css" rel="stylesheet" type="text/css" />
        <link href="../css/main.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <?php
        // put your code here
        ?>

        <header>
            <?php
            include 'header.php';
            ?>
        </header>

        <nav>
            <?php
            include 'nav.php';
            ?> 
        </nav>

        <main>
            <h1>Inscription</h1>
            <section id="centre">
                <article>
                    <!--                    <h1>Inscription</h1>-->
                    <form action="../controllers/InscriptionCTRL.php" method="GET">
                        <p>
                            <label class="etiquette">Civilit&eacute; </label>
                            <input type="radio" name="civilite" id="civilite_H" value="H" class="obligatoire" />
                            <label for="civilite_H">Monsieur </label>
                            <input type="radio" name="civilite" id="civilite_F" value="F" class="obligatoire" />
                            <label for="civilite_F">Madame </label>
                            <input type="radio" name="civilite" id="civilite_A" value="A" class="obligatoire" />
                            <label for="civilite_F">Autre </label>
                            <label class="texteRouge">*</label>
                        </p>
                        <p>
                            <label for="nom" class="etiquette">Nom </label>
                            <input type="text" size="50" name="nom" id="nom" value="Buguet" placeholder="Votre nom ?" class="saisie" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessageNom">Nom invalide</label>
                        </p>
                        <p>
                            <label for="prenom" class="etiquette">Pr&eacute;nom </label>
                            <input type="text" size="50" name="prenom" id="prenom" placeholder="Votre prénom ?"  value="Pascal" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessagePrenom"></label>
                        </p>

                        <p>
                            <label for="dateNaissance" class="etiquette">Date de naissance</label>
                            <input type="date" name="dateNaissance" id="dateNaissance" placeholder="Votre date de naissance ?" value="" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessageDateNaissance"></label>
                        </p>

                        <!-- ici, dans le BO, le pseudo est egal a l'e-mail -->
                        <!--            <div class="row">
                                            <p>
                                                <label for="pseudo" >Pseudo </label>
                                                <input type="text" size="50" name="pseudo" id="pseudo" value="<?php echo $laData["pseudo"]; ?>" />
                                                <label class="texteRouge">*</label>
                                            </p>
                                        </div>-->
                        <p>
                            <label for="email1" class="etiquette">E-mail </label>
                            <input type="text" size="50" name="email1" id="email1" placeholder="Votre e-mail ?" value="pb@gmail.com" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessageEmail"></label>
                        </p>
                        <p>
                            <label for="email2" class="etiquette">Retapez l'e-mail </label>

                            <input type="text" size="50" name="email2" id="email2" placeholder="Ressisissez votre e-mail ?"  value="pb@gmail.com" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessageEmail2"></label>
                        </p>
                        <p>
                            <label for="pseudo" class="etiquette">Pseudo </label>
                            <input type="text" size="50" name="pseudo" id="pseudo" placeholder="Votre pseudo ?" value="Yann" />
                            <label class="texteRouge">*</label>
                            <label id="lblMessagePseudo"></label>
                        </p>
                        <p>
                            <label for="mdp1" class="etiquette">Mot de passe </label>
                            <input type="password" size="50" name="mdp1" id="mdp1" placeholder="Votre mot de passe ?" value="Mdp123" />
                            <label class="texteRouge">*</label>

                            <label id="lblMessageMDP"></label>
                        </p>
                        <p>
                            <label for="mdp2" class="etiquette">Retapez le mot de passe </label>
                            <input type="password" size="50" name="mdp2" id="mdp2" placeholder="Ressaisissez votre mot de passe ?" value="Mdp123" />
                            <label class="texteRouge">*</label>
                            <img src="../icons/cles.jpg" alt="Clés" id="cles" />
                            <label id="lblMessageMDP2"></label>
                        </p>
                        <p>
                            <label for="cv" class="etiquette">C.V.</label>
                            <textarea rows="5" cols="60" name="cv" id="cv" placeholder="Votre CV ?">Mom C.V. ...</textarea>
                            <label class="texteRouge">*</label>
                            <label id="lblMessageCV"></label>
                        </p>
                        <p>
                            <label for="adresse" class="etiquette">Adresse</label>
                            <input type="text" size="50" name="adresse" id="adresse" placeholder="Votre adresse ?" value="293, rue du fg ..."/>
                            <label class="texteRouge">*</label>
                            <label id="lblAdresse"></label>
                        </p>
                        <p>
                            <label for="cp" class="etiquette">Ville</label>
                            <select name="cp" id="cp">
                                <option value='0' selected="selected">-Choisissez une ville-</option>

                                <option value='75000'>Paris</option>
                                <option value='69000'>Lyon</option>
                                <option value='13000'>Marseille</option>
                                <option value='33000'>Bordeaux</option>
                                <option value='59000'>Lille</option>

                            </select>
                            <label class="texteRouge">*</label>
                        </p>
                        <p>
                            <label for="hobbies" class="etiquette">Hobbies</label>
                            <select name="hobbies[]" id="hobbies" multiple="multiple">
                                <option value='1'>Cin&eacute;ma</option>
                                <option value='2'>Th&eacute;&acirc;tre</option>
                                <option value='3'>Concert</option>
                                <option value='4'>Mus&eacute;e</option>
                                <option value='5'>Conf&eacute;rence</option>
                            </select>
                            <label class="texteRouge">*</label>
                        </p>
                        <p>
                            <label for="newsletter" class="etiquette">News Letter ?</label>
                            <input type="checkbox" name="newsletter" id="newsletter" />
                        </p>
                        <p>
                            <button type="submit" name='btValider' id="btValider">
                                Valider
                            </button>
                        </p>
                    </form>

                    <p id="Message" class="texteGris">
                        <?php
                        if (isSet($messageOK)) {
                            echo $messageOK;
                        }
                        ?>
                    </p>
                    <p id="errorMessage" class="texteRouge">
                        <?php
                        if (isSet($messageKO)) {
                            echo $messageKO;
                        }
                        ?>
                    </p>

                    <br><br>
                </article>
            </section>

            <aside>
            </aside>
        </main>

        <footer>
            <?php
            include 'footer.php';
            ?> 
        </footer>

    </body>
</html>
