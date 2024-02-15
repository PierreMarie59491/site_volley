/* 
 * formAndSubmit.js
 * Traitement du submit
 */

/**
 * 
 * @returns {undefined}
 */
function initFormulaire() {
    // document.getElementById("formulaire").onsubmit = valider
    document.getElementById("formInscription").addEventListener("submit", valider)

} /// initFormulaire


function valider(event) {
    console.log(event)
    //O, inhibe l'événement SUBMIT
    event.preventDefault()
    let nom = document.getElementById("nom").value.trim()
    let prenom = document.getElementById("prenom").value.trim()
    let pseudo = document.getElementById("pseudo").value.trim()
    let birth = document.getElementById("birth").value.trim()
    let mdp1 = document.getElementById("mdp1").value.trim()
    let mdp2 = document.getElementById("mdp2").value.trim()
    let email1 = document.getElementById("email1").value.trim()
    let email2 = document.getElementById("email2").value.trim()
    let telephone = document.getElementById("telephone").value.trim()
    let licence = document.getElementById("licence").value.trim()
    let adresse = document.getElementById("adresse").value.trim()


    if (pseudo !== "" && nom !== "" && prenom !== "" && mdp1 !== "" && mdp2 !== ""
    && email1 !== "" && email2 !== ""&& birth !== ""&& telephone !== "" && licence !== ""
    && adresse!= "") {
        document.getElementById("formInscription").submit()
    } else {
        document.getElementById("lblMessage").innerHTML = "Tous les champs sont obligatoire"
    }
    if (!civilité_F && !civilité_H){
        document.getElementById("lblMessage").innerHTML = "Veuillez choisir un genre"
    }

}

/*
 * MAIN
 */
window.onload = initFormulaire
