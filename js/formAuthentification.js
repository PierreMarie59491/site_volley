/*
 authentification.js
 */

/**
 * 
 * @returns {undefined}
 */

var langue = ""


function initAuthentification() {
    // Quand l'utilisateur clique sur le bouton "valider"
    // On sollicite la fonction valider
    document.getElementById("ficheAuthentif").onclick = valider // onclick en minuscule
    console.log("initAuthentification")
    document.getElementById("pseudo").value = "p"
    document.getElementById("mdp").value = "b"
    document.getElementById("lblMessage").innerHTML = ""
    // Gestion du clic sur la case à cocher
    // document.getElementById("chkMdpVisible").onclick = mdpVisible
} /// initAuthentification


/**
 * 
 * @returns {undefined}
 */
function mdpVisible() {
    console.log("mdpVisible")
    console.log(document.getElementById("chkMdpVisible").checked)

    if (document.getElementById("chkMdpVisible").checked) {
        document.getElementById("mdp").type = "text"
        document.getElementById("lblMdpVisible").innerHTML = "Masquer le mot de passe"
    } else {
        document.getElementById("mdp").type = "password"
        document.getElementById("lblMdpVisible").innerHTML = "Afficher le mot de passe"
    }
}
/**
 * 
 * @returns {undefined}
 */
function valider(event) {
    console.log(event)

    event.preventDefault()
    // Déclaration d'une variable et affectation d'une valeur
    let message = "0K"
    // Récupération d'une saisie de l'utilisateur
    let pseudo = document.getElementById("pseudo").value
    let mdp = document.getElementById("mdp").value
    console.log(pseudo)
    // Test des valeurs saisies
    // trim() enlève les espaces avant et après
    // Si le pseudo est vide ou si le mdp est vide alors
    if (pseudo.trim() === "" || mdp.trim() === "") {
        // Affectation de "Il faut tout saisir" à la variable message
        message = "Veuillez remplir tous les champs"
    }
    // Affichage d'une valeur (0K ou Il faut tout saisir) dans le <label>
    document.getElementById("lblMessage").innerHTML = message
} /// initAuthentification

// Au chargement de la page et de la lecture du fichier js on sollicite la fonction init
window.onload = initAuthentification
