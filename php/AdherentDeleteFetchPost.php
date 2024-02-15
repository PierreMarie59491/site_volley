<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>AdherentDeleteFetchPOST.html</title>
  </head>
  <body>
    <form method="post" action="AdherentDeleteMySQLPOSTV2.php">
    <label>Mot de passe :</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" value="Pierro" />

    <label>Email :</label>
    <input type="text" name="email" id="email" value="" />
    <select class="etiquette" name="email">
        <?php
        echo $emailSelect;
        ?>
    </select><br>
    <input type="button" value="Supprimer Compte" name="btDelete" id="btDelete" />

    <div id="message"></div>

    <script>
      document.getElementById("btDelete").addEventListener("click", () => {
        let motDePasse = document.getElementById("mot_de_passe").value;
        let email = document.getElementById("email").value;
        postData(motDePasse, email);
      });

      function postData(motDePasse, email) {
        let adherent = {
          //arguments de l'objet adherent au format JSON
          motDePasse: motDePasse,
          email: email,
        };
        const URL =
          "http://127.0.0.1/PourFrontJS/php/AdherentDeleteMySQLPOSTV2.php";
        fetch(URL, {
          method: "POST",
          //headers: {
          //'Content-Type': 'application/json;charset=utf-8'
          //},
          body: JSON.stringify(adherent),
        })
          .then((response) => {
            console.log("RESPONSE");
            console.log(response);
            return response.json();
          })
          .then(
            (result) => {
              console.log("RESULT");
              // Un objet JSON
              console.log(result);
              document.getElementById("message").innerHTML = result.message;
            },
            (error) => {
              console.log("ERROR");
              console.log(error);
              document.getElementById("message").innerHTML = error;
            }
          );
      } /// postData
    </script>
  </body>
</html>
