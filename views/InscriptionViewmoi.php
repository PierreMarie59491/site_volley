<!DOCTYPE html>
<html lang= "fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="siteVolleyLaMadeleine">
    <title>IdentificationView</title>
    <link rel="stylesheet" type="text/css" href="../css/inscription.css">
</head>
<!--<header>
     include header.php
    </header>-->
<body>
    <fieldset>
        <form name="inscription" method="get" action="../controllers/InscriptionCtrlPascal.php">
            <p>
                <label>Civilité</label>
                <input type="radio" id="monsieur" name="civilite" value="monsieur" />
                <label  for="monsieur" class="radio">Monsieur</label>

                <input type="radio" id="madame" name="civilite" value="madame" />
                <label for="madame">Madame</label>
            </p>

            <p>
                <label>Nom</label>
                <input class="donnees" type="text" value="Tintin" name="nom" placeholder="Indiquez votre nom">
            </p>
            <p><label class=Label>Prénom</label>
                <input class="donnees" type="text" value="Reporter" name="prénom" placeholder="Indiquez votre prénom">
            </p>
            <p>
                <label>Date de naissance</label>
                <input class="donnees" type="date" value="" name="date_de_naissance" placeholder="Indiquez votre date de naissance">
            </p>
            <p>
                <label>Email</label>
                <input class="donnees" type="text" value="" name="email1" placeholder="Indiquez votre email">
            </p>
            <p>
                <label>Retappez l'Email</label>
                <input class="donnees" type="text" value="" name="email2" placeholder="Retappez votre email">
            </p>
            <p>
                <label>Pseudo</label>
                <input class="donnees" type="text" value="Tintin" name="pseudo" placeholder="Indiquez votre pseudo">
            </p>
            <p>
                <label>Mot de passe</label>
                <input class="donnees" type="password" value="" name="motDePasse1" placeholder="Indiquez votre mot de passe" maxlength="15" lenght= 200px>
            </p>
            <p>
                <label>Retapez le mot de passe</label>
                <input class="donnees" type="password" value="" name="motDePasse2" placeholder="Retapez votre mot de passe">
            </p>
            <p>
                <label>C.V</label>
                <textarea  class="cv" value="Reporter à Paris-Match" name="cv" placeholder="Reporter chez Paris-Match"></textarea>
            </p> 
            <p>
                <label>Adresse</label>
                <input class="donnees" type="text" value="33 rue du fg st Antoine" name="adresse" placeholder="Indiquez votre adresse">
            </p>
            <p>
                <label>Ville</label>
                <select class="hob" name="ville" id="ville">
                    <option value="select">---Sélectionnez votre ville---</option>
                    <option value="75000">Paris</option>
                    <option value="69000">Lyon</option>
                    <option value="13000">Marseille</option>
                    <option value="31000">Toulouse</option>
                </select>
            </p>

            <p>
                <label>Hobbies</label>
                <select class="hob" name="hobbies[]" id="hobbies" multiple= 'multiple' size="5" multiple>
                    <option value="null" size 3>--- Sélectionnez un hobbie ---</option>
                    </option>
                    <option value="Cinéma">Cinéma</option>
                    <option value="Théatre">Théâtre</option>
                    <option value="Concert">Concert</option>
                    
                </select>
            </p>
            <label>News Letter?</label>
            <input class="hob" type="checkbox" name="newsLetter" value="newsLetter" checked='checked'><br>
            <input type="submit" value="Valider"><br>
        </form>
    </fieldset>
    <p>
    <?php
    //if (IsSet($message)) {
   //echo $message;
    //}
    ?>
    </p>
</body>

</html>