var lesLiens = document.getElementsByClassName("js-a-likes")

for (var i = 0; i < lesLiens.length; i++) {
    lesLiens[i].addEventListener('click', majLike);
}

function majLike(event) {
    event.preventDefault()

    let baliseA = event.target.parentNode

    let url = baliseA.getAttribute("href")

    fetch(url)
        .then(
            function (response) {
                if (response.ok){
                    return response.json()
                
                }

            }
        )
        .then(function (data) {
            if(event.target == baliseA.firstElementChild)
            event.target.nextElementSibling.textContent = data.likes
            else
            if (event.target == baliseA.lastElementChild){
                event.target.previousElementSibling.textContent = data.likes
                }
            else
            event.target.textContent = data.likes
        })


}
