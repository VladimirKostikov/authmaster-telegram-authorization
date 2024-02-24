/**
 * Module countSlidesInElement
 * This module counts the number of slides in a slider
 * 
 * @param {string} element 
 * @returns count
 */

export default function(element) {
    // Get child elements
    let childrenElements = document.querySelector(element).children;
    
    // Number of slides
    let count = 0;
    
    // Loop that counts the number of slides
    for(let i=0; i<childrenElements.length; i++) {
        // If the element is a slide increase the number of slides
        if(!childrenElements[i].classList.contains('slidercraft-class')) {
            count++;
        }
    }

    return count;
}