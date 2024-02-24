/**
 * 
 * Main js file
 * Must be connected as a module
 * 
 */

// Get modules
import elementExist from './modules/elementExist.js';
import prepareElement from './modules/prepareElement.js';
import renderElement from './modules/renderElement.js';
import countSlidesInElement from './modules/countSlidesInElement.js';
import renderArrows from './modules/renderArrows.js';

// Standard values ​​for slider parameters
const DEFAULT_WIDTH = "820px";
const DEFAULT_HEIGHT = "480px";
const DEFAULT_START = 0;
const DEFAULT_TIMER = 3000;
const DEFAULT_ARROWS = true;
const DEFAULT_AUTOPLAY = true;

// Class responsible for error output
class ValidationError extends Error {
    constructor(message) {
      super(message);
      this.name = "ValidationError";
    }
}

// Main slider class
export default class SliderCraft {

    // Initializing the array of slider parameters
    options = {
        width: DEFAULT_WIDTH,
        height: DEFAULT_HEIGHT,
        start: DEFAULT_START,
        timer: DEFAULT_TIMER,
        arrows: DEFAULT_ARROWS,
        autoPlay: DEFAULT_AUTOPLAY,
    }

    /**
     * Class constructor
     * @param {string} element
     * @param {array} params
     */
    constructor(element, params) {
        this.consoleInfo();

        // If slider parameters are specified, apply the specified ones
        if(params) {
            this.options = {
                width: params.width ?? DEFAULT_WIDTH,
                height: params.height ?? DEFAULT_HEIGHT,
                start: params.start ?? DEFAULT_START,
                timer: params.timer ?? DEFAULT_TIMER,
                arrows: params.arrows ?? DEFAULT_ARROWS,
                autoPlay: params.autoPlay ?? DEFAULT_AUTOPLAY,
            }
        }

        this.element = element;
        this.slides = countSlidesInElement(this.element);
        this.init();
    }

    // Opening slide
    slide = this.options.start;

    // Slide scrolling interval
    interval;

    

    consoleInfo() {
        console.log(
            "%cSlider%ccraft",
            "color: #333; font-weight:800; font-size: 14px; background-color: yellow; padding: 5px 10px; border-top-left-radius: 10px; border-bottom-left-radius: 10px",
            "font-size: 14px; background-color: #333; color: #FFF;padding: 5px 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px"
        );
        console.log(
            "%cMade by Vladimir Kostikov",
            "font-size: 14px; background-color: #333; color: #FFF;padding: 5px 10px; border-raidus: 10px"
        );
    }

    // Slider initialization
    init() {

        // Is the element specified?
        if(!this.element) {
            throw new ValidationError("Error. Element not specified");
        }
        else {
            // Does the element exist?
            if(!elementExist(this.element))
                throw new ValidationError("Error. Element not exist");
            else {
                // Slider generation
                prepareElement(this.element, this.options.width, this.options.height);
                renderElement(this.element, this.options.start);

                if(this.options.arrows)
                    renderArrows(this.element, this);

                if(this.options.autoPlay)
                    this.play();
            }
        }
    }

    // Show next slide
    next() {
        if(this.slide + 1 != this.slides)
            this.slide++;
        else
            this.slide = 0;
        
        renderElement(this.element, this.slide);

        clearInterval(this.interval);
        if(this.options.autoPlay)
            this.play();
    }

    // Show previous slide
    previous() {
        if(this.slide - 1 != -1)
            this.slide--;
        else
            this.slide = this.slides - 1;

        renderElement(this.element, this.slide);

        clearInterval(this.interval);
        if(this.options.autoPlay)
            this.play();
    }

    // Automatic scrolling slider
    play() {
        this.interval = setInterval(() => {
            if(this.slide + 1  != this.slides) {
                this.slide++;
                renderElement(this.element, this.slide);
            }
            else {
                this.slide = 0;
                renderElement(this.element, this.slide);
            }
        }, this.options.timer);
    }

    // Go to the specified slide
    goSlide(slide) {
        this.slide = slide;
        renderElement(this.element, this.slide);
        clearInterval(this.interval);
        if(this.options.autoPlay)
            this.play();
    }
}
