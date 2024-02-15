// cpItonVille.js

document.getElementById("cpInput").addEventListener("keyup", function () {
  // getVilles();
  console.log("keyup");
  // console.log(e); // recupere la key press
  console.log(document.getElementById("cpInput").value.length);
  if (document.getElementById("cpInput").value.length > 3) {
    getVilles(document.getElementById("cpInput").value);
  }
});

function getVilles(cp) {
  const URL = "http://localhost/site_volley/php/cpIntoVille.php?cp=" + cp;

  fetch(URL)
    .then((response) => {
      return response.json();
    })
    .then((result) => {
      console.log(result);
      const villeSelect = document.getElementById("villeSelect");

      // While vérifie si villeSelect.firstChild = true et tant qu'il y a une premiere option, on clear le select à chaque event keyup
      while (villeSelect.firstChild) {
        villeSelect.removeChild(villeSelect.firstChild);
      }

      for (let i = 0; i < result.length; i++) {
        let option = document.createElement("option");
        option.value = result[i].cp;
        option.textContent = result[i].nom;
        villeSelect.appendChild(option);
      }
    }),
    (error) => {
      console.log("ERROR");
      console.log(error);
    };
}
