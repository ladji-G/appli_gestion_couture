const wrapper =document.querySelector(".wrapper"),
selectBtn =wrapper.querySelector(".select-btn"),
searchInp =wrapper.querySelector("input"),
options =wrapper.querySelector(".options");

let commande = ["ali", "badra", "moi", "papa", "tonton", "opoee", "salopar", "gagaga", "loliu",
"mpoiuy", "allahouman", "jesus", "eglise", "dabakala", "bouake", "baby", "katiola", "ici"];


function addcommandes(selectCommandes){
    options.innerHTML = "";
    commande.forEach(commandes => {
        let isSelected = commandes == selectCommandes ? "Selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${commandes}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addcommandes();


function updateName(selectedLi){
    searchInp.value = "";
    addcommandes(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;   
}


searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchedVal = searchInp.value.toLowerCase();
    arr = commande.filter(data => {
        return data.toLowerCase().startsWith(searchedVal);
    }).map(data => `<li>${data}</li>`).join("");
    options.innerHTML = arr ? arr : `<p>Desolé! ce client n'existe pas !</p>`;

});


selectBtn.addEventListener("click", () => {
    wrapper.classList.toggle("active");
});