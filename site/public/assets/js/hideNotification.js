function hideNotification() {
    let divs = document.getElementsByClassName("notification"); 
    for(let i = 0; i < divs.length; i++){
        divs[i].style.visibility = "hidden"; 
        divs[i].style.display = "none";
    }
}