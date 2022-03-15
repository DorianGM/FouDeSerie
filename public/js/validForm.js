var i = document.getElementById("serie_image");
var button = document.getElementById("button");

i.addEventListener('keyup', getImage);
reJpg = new RegExp('.jpg$')
rePng = new RegExp('.png$')

var span = document.getElementById("erreur") ;

function getImage(){
    if(reJpg.test(i.value) == true || rePng.test(i.value) == true){
        span.style.color = "green"
     span.textContent = "La saisie est correcte"
     button.removeAttribute('disabled')
    } else {
        span.style.color = "red"
        span.textContent = "La saisie n'est pas correcte"
        button.disabled = true

    }
}


