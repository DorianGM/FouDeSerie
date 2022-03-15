var myElt=document.getElementsByClassName("nav-link active");

console.log(myElt);
for(let i = 0; i < myElt.length; i++){
    if(myElt[i].textContent=="Les Séries")
    myElt[i].style.color="red";
}