/**
 * Module renderArrows
 * This module draws slider arrows
 * 
 * @param {string} element 
 * @param {SliderCraftt} obj 
 */

export default async function renderArrows(element, obj) {
    // Get the template (arrowLeft)
    await fetch("assets/js/slidercraft/templates/arrowLeft.html")
        .then((response) => response.text())
        .then((html) => {
            document.querySelector(element).innerHTML += html;
        })
        .catch((error) => {
            console.warn(error);
        });


    // Get the template (arrowRight)
    await fetch("assets/js/slidercraft/templates/arrowRight.html")
        .then((response) => response.text())
        .then((html) => {
            document.querySelector(element).innerHTML += html;
        })
        .catch((error) => {
            console.warn(error);
        });


    // Set events on drawn arrows
    let arrowLeft = document.getElementById('slidercraft-previous');
    let arrowLeftFunction = "previous";
    arrowLeft.addEventListener('click', () => {
        obj[arrowLeftFunction]();
    })

    let arrowRight = document.getElementById('slidercraft-next');
    let arrowRightFunction = "next";

    arrowRight.addEventListener('click', () => {
        obj[arrowRightFunction]();
    })

}