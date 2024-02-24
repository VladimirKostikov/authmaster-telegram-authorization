/**
 * Module renderElements
 * Renders slides depending on which slide is current
 * 
 * @param {string} element 
 * @param {int} slide 
 */

export default function(element, slide) {
    let childrenElements = document.querySelector(element).children;

    for(let i=0; i<childrenElements.length; i++) {
        if(!childrenElements[i].classList.contains('slidercraft-class')) {
            if(childrenElements[i].dataset.slide == slide)
                childrenElements[i].style.display = 'block';
            else
                childrenElements[i].style.display = 'none';
        }
    }
}