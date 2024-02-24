/**
 * Module elementExist
 * This module checks whether the element that was specified in the first argument to the class constructor exists
 * 
 * @param {string} element 
 * @returns boolean
 */

export default function(element) {
    if(document.querySelector(element) != null)
        return true;
    else
        return false;
}