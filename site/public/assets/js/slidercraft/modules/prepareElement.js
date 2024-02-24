/**
 * Module prepareElement
 * This module sets styles for the slider
 * 
 * @param {string} element 
 * @param {string} width 
 * @param {string} height 
 */

export default function(element, width, height) {
    // Get element containing the slider
    let mainSliderElement = document.querySelector(element);

    // Set width and height of slider from the parameters
    mainSliderElement.style.width = width;
    mainSliderElement.style.height = height;

    // Get child elements
    let childrenElements = document.querySelector(element).children;
    
    // Setting styles and attributes for slides
    let index = 0;
    for(let i=0; i<childrenElements.length; i++) {
        if(!childrenElements[i].classList.contains('slidercraft-class')) {
            childrenElements[i].dataset.slide = index;
            childrenElements[i].style.display = 'none';
            index++;
        }
    }
}