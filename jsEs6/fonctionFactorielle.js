function prixTTC(prixHT, taux) {
let prixTTC = prixHT + prixHT*(taux/100);
return prixTTC
}
document.getElementById("id").innerHTML = prixTTC(100, 20)