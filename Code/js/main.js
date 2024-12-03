/* Evenement clic sur la fleche déroulante */

let bouton = document.getElementById("choix");
let divChoix = document.getElementById("bar");

bouton.addEventListener("click", () => {
    if(getComputedStyle(divChoix).display != "none"){
        divChoix.style.display = "none";
    } else {
        divChoix.style.display = "flex";
    }
})

/* Evenement choix des filtres pour la recherche */

let tableau = [];
let x=0;

for(let i=0;i<6;i++){
    let boutonv2 = document.getElementsByClassName("choice")[x];

    boutonv2.addEventListener("click", () => {
        if(boutonv2.style.border=="3px solid red"){
            let pos = tableau.indexOf(boutonv2.name);
            tableau.splice(pos, 1);
            boutonv2.style.border="3px solid grey";
            boutonv2.style.background="#cec5c5";
            boutonv2.style.color="black";
            console.log(tableau.length);
        }else{
            tableau.push(boutonv2.name);
            console.log(tableau.length);
            boutonv2.style.border="3px solid red";
            boutonv2.style.background="#ff4040";
            boutonv2.style.color="white";
        }    
    })
    x=x+1;
}

document.getElementById("recherche").addEventListener("submit",function(e) {
    console.log(tableau);
});
